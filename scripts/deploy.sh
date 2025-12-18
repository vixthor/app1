#!/usr/bin/env bash
set -euo pipefail

# deploy.sh
# Runs the deployment steps remotely over SSH. Edit the variables below.
# Usage: ./deploy.sh

# ====== Configuration ======
SSH_USER=${SSH_USER:-deploy}
SSH_HOST=${SSH_HOST:-your.server.ip}
SSH_KEY=${SSH_KEY:-~/.ssh/your-key.pem}
APP_DIR=${APP_DIR:-/var/www/app1}
BRANCH=${BRANCH:-main}
COMPOSER_BIN=${COMPOSER_BIN:-composer}
NODE_BIN=${NODE_BIN:-node}
NPM_BIN=${NPM_BIN:-npm}
# ===========================

if [ "$SSH_HOST" = "your.server.ip" ]; then
  echo "Please edit the top of this script and set SSH_HOST (and other variables)."
  exit 1
fi

echo "Deploying branch $BRANCH to $SSH_USER@$SSH_HOST:$APP_DIR"

ssh -i "$SSH_KEY" "$SSH_USER@$SSH_HOST" /bin/bash <<'REMOTE'
set -euo pipefail
cd "$APP_DIR"
echo "Fetching latest code"
git fetch --all --prune
git checkout "$BRANCH"
git reset --hard "origin/$BRANCH"

echo "Installing PHP dependencies"
${COMPOSER_BIN} install --no-dev --prefer-dist --optimize-autoloader --no-interaction

echo "Building frontend assets"
if [ -f package.json ]; then
  ${NPM_BIN} ci
  ${NPM_BIN} run build
fi

echo "Running migrations"
php artisan migrate --force

echo "Clearing and caching config/routes/views"
php artisan config:cache
php artisan route:cache
php artisan view:cache || true

echo "Restarting php-fpm and nginx"
sudo systemctl reload php8.2-fpm || sudo systemctl restart php8.2-fpm || true
sudo systemctl reload nginx || true

echo "Restarting supervisor workers"
sudo supervisorctl reread || true
sudo supervisorctl update || true
sudo supervisorctl restart all || true

echo "Deployment finished"
REMOTE
