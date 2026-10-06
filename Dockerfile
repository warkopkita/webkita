# ==========================================
# STAGE 1: Frontend Asset Builder (Node.js)
# ==========================================
FROM node:20-alpine AS frontend-builder
WORKDIR /app

COPY package*.json vite.config.js ./
RUN npm ci || npm install

COPY resources/ ./resources/
COPY public/ ./public/
RUN npm run build

# ==========================================
# STAGE 2: PHP 8.3 FPM Production Runtime
# ==========================================
FROM php:8.3-fpm-alpine AS production-app

# System tools with reliable alpine mirror
RUN apk update && apk add --no-cache curl git zip unzip netcat-openbsd

# Fast pre-compiled PHP extension installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_mysql bcmath gd zip redis

# Composer from official image
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files
COPY . .

# Copy compiled frontend assets from Stage 1
COPY --from=frontend-builder /app/public/build ./public/build

# Copy PHP and OPcache configuration
COPY docker/php/php.ini /usr/local/etc/php/conf.d/99-webkita.ini
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/99-opcache.ini

# Copy and prepare entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Install production PHP dependencies
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
