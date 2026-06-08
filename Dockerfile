FROM node:18-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js postcss.config.js tailwind.config.js ./
COPY resources ./resources
RUN npm run build

FROM php:8.2-cli-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libpq-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql gd zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .
COPY --from=assets /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && chmod +x docker/render-start.sh \
    && chmod -R 775 storage bootstrap/cache

ENV COMPOSER_ALLOW_SUPERUSER=1

CMD ["docker/render-start.sh"]
