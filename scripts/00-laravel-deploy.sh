#!/usr/bin/env bash
set -e

echo "Running composer..."
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

echo "Caching config..."
php /var/www/html/artisan config:cache

echo "Caching routes..."
php /var/www/html/artisan route:cache

echo "Caching views..."
php /var/www/html/artisan view:cache

echo "Linking storage..."
php /var/www/html/artisan storage:link || true

echo "Running migrations..."
php /var/www/html/artisan migrate --force
