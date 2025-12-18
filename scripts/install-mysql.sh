#!/usr/bin/env bash
set -euo pipefail

# install-mysql.sh
# Non-destructive helper to install and initialize MySQL on Ubuntu 22.04.
# Edit the variables below before running. Run as a sudo-capable user.

# =========== Configuration - edit these before running ===========
DB_NAME=${DB_NAME:-app1_db}
DB_USER=${DB_USER:-app1_user}
DB_PASS=${DB_PASS:-ChangeMeStrongPassword!}
ROOT_PASS=${ROOT_PASS:-}
# If ROOT_PASS is empty the script will not change root auth plugin by default.
# ==================================================================

echo "Installing MySQL server..."
sudo apt update
sudo DEBIAN_FRONTEND=noninteractive apt install -y mysql-server

echo "Ensuring MySQL is running"
sudo systemctl enable --now mysql
sudo systemctl status mysql --no-pager || true

if [ -n "$ROOT_PASS" ]; then
  echo "Setting root password and switching to mysql_native_password auth"
  sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '${ROOT_PASS}'; FLUSH PRIVILEGES;"
fi

echo "Creating database and application user (if not exists)"
sudo mysql <<SQL
CREATE DATABASE IF NOT EXISTS \\`${DB_NAME}\\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';
GRANT ALL PRIVILEGES ON \\`${DB_NAME}\\`.* TO '${DB_USER}'@'localhost';
FLUSH PRIVILEGES;
SQL

echo "Configuring MySQL bind-address to localhost only"
MYCNF=/etc/mysql/mysql.conf.d/mysqld.cnf
sudo sed -i "s/^bind-address.*/bind-address = 127.0.0.1/" "$MYCNF" || true
sudo systemctl restart mysql

echo "MySQL installation and basic configuration complete."
echo "DB: $DB_NAME  User: $DB_USER"
echo "Remember to update your Laravel .env with these credentials and run migrations."
