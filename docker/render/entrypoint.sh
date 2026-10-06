#!/bin/sh
set -e

echo "==> [Render] Initializing Webkita Production Runtime..."

# Port configuration for Nginx (Render injects $PORT)
TARGET_PORT="${PORT:-10000}"
echo "==> [Render] Configuring Nginx to listen on port $TARGET_PORT..."
mkdir -p /etc/nginx/http.d
sed "s/__PORT__/$TARGET_PORT/g" /etc/nginx/templates/default.conf.template > /etc/nginx/http.d/default.conf

# Storage directories and permissions
mkdir -p /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# If SQLite is used and file does not exist
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    DB_PATH="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
    if [ ! -f "$DB_PATH" ]; then
        echo "==> [Render] Creating SQLite database at $DB_PATH..."
        touch "$DB_PATH"
        chown www-data:www-data "$DB_PATH"
        chmod 664 "$DB_PATH"
    fi
fi

# Storage symlink
php artisan storage:link --force || true

# Run database migrations
echo "==> [Render] Running database migrations..."
php artisan migrate --force || true

# Run database seeder if requested
if [ "$RUN_SEEDER" = "true" ]; then
    echo "==> [Render] Running database seeder..."
    php artisan db:seed --force || true
fi

# Cache optimizations for production
echo "==> [Render] Warming production caches..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start PHP-FPM in background daemon mode
echo "==> [Render] Starting PHP-FPM daemon..."
php-fpm -D

# Start Nginx in foreground mode
echo "==> [Render] Starting Nginx on port $TARGET_PORT..."
exec nginx -g "daemon off;"
