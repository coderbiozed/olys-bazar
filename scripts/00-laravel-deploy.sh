#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

echo "Fixing storage permissions..."
chmod -R 775 storage bootstrap/cache
chown -R nginx:nginx storage bootstrap/cache 2>/dev/null || chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

echo "Running composer..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Clearing old caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database (first deploy)..."
php artisan db:seed --force || true

echo "Linking storage..."
php artisan storage:link || true

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache
