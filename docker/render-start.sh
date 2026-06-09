#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

echo "Fixing storage permissions..."
chmod -R 775 storage bootstrap/cache

if [ -z "${APP_KEY:-}" ]; then
  echo "APP_KEY missing, generating..."
  export APP_KEY="$(php artisan key:generate --show)"
fi

echo "Running composer..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear || true

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force || true

echo "Linking storage..."
php artisan storage:link || true

PORT="${PORT:-10000}"
echo "Starting Laravel on 0.0.0.0:${PORT}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT}"
