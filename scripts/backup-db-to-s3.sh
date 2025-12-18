#!/usr/bin/env bash
set -euo pipefail

# backup-db-to-s3.sh
# Dumps the MySQL database, compresses it, and uploads to S3 using AWS CLI.
# The EC2 instance should have AWS CLI installed and an IAM role with S3 PutObject permissions,
# or AWS credentials configured in ~/.aws/.

# ===== Configuration - edit or export as environment variables =====
DB_NAME=${DB_NAME:-app1_db}
DB_USER=${DB_USER:-app1_user}
DB_PASS=${DB_PASS:-ChangeMeStrongPassword!}
S3_BUCKET=${S3_BUCKET:-your-s3-bucket}
S3_PREFIX=${S3_PREFIX:-backups/mysql}
AWS_REGION=${AWS_REGION:-us-east-1}
BACKUP_DIR=${BACKUP_DIR:-/var/backups}
# ==================================================================

TIMESTAMP=$(date +"%F-%H%M")
FILENAME="${DB_NAME}_${TIMESTAMP}.sql.gz"
LOCAL_PATH="${BACKUP_DIR}/${FILENAME}"

mkdir -p "$BACKUP_DIR"

echo "Creating dump for ${DB_NAME}"
mysqldump -u "${DB_USER}" -p"${DB_PASS}" "${DB_NAME}" | gzip > "$LOCAL_PATH"

echo "Upload to s3://${S3_BUCKET}/${S3_PREFIX}/${FILENAME}"
aws s3 cp "$LOCAL_PATH" "s3://${S3_BUCKET}/${S3_PREFIX}/${FILENAME}" --region "$AWS_REGION"

if [ $? -eq 0 ]; then
  echo "Backup uploaded successfully. Removing local copy."
  rm -f "$LOCAL_PATH"
else
  echo "Upload failed — keeping local copy at $LOCAL_PATH"
fi

echo "Done"
