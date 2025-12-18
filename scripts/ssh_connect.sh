#!/usr/bin/env bash
# Simple SSH helper
# Usage: ./ssh_connect.sh <user> <host> <path-to-key>
# Examples:
#   ./ssh_connect.sh deploy 54.12.34.56 ~/.ssh/prod-key.pem

USER=${1:-deploy}
HOST=${2:-your.server.ip}
KEY=${3:-~/.ssh/your-key.pem}

if [ -z "$HOST" ] || [ "$HOST" = "your.server.ip" ]; then
  echo "Usage: $0 <user> <host> <path-to-key>"
  exit 1
fi

echo "Connecting to $USER@$HOST using key $KEY"
ssh -i "$KEY" "$USER@$HOST"
