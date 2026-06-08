#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

echo "Fixing storage permissions..."
chmod -R 775 storage bootstrap/cache

echo "Running composer..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force || true

echo "Linking storage..."
php artisan storage:link || true

echo "Caching config and routes..."
php artisan config:cache
php artisan route:cache

PORT="${PORT:-10000}"
echo "Starting Laravel on 0.0.0.0:${PORT}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT}"
