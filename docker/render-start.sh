#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

echo "=== Mukamghor startup ==="
echo "PORT=${PORT:-10000}"
echo "APP_KEY set: $([ -n "${APP_KEY:-}" ] && echo yes || echo NO)"
echo "DB_CONNECTION=${DB_CONNECTION:-not-set}"
echo "DATABASE_URL set: $([ -n "${DATABASE_URL:-}" ] && echo yes || echo NO)"

chmod -R 777 storage bootstrap/cache

if [ -z "${APP_KEY:-}" ]; then
  echo "APP_KEY missing, generating..."
  export APP_KEY="$(php artisan key:generate --show)"
fi

composer install --no-dev --optimize-autoloader --no-interaction

php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear || true

echo "Migration status:"
php artisan migrate:status 2>&1 || true

echo "Running migrations..."
if ! php artisan migrate --force 2>&1; then
  echo "ERROR: migrations failed"
fi

echo "Seeding database..."
php artisan db:seed --force 2>&1 || echo "WARNING: seeding skipped or failed"

php artisan storage:link || true

PORT="${PORT:-10000}"
echo "Starting Laravel on 0.0.0.0:${PORT}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT}"
