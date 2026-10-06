#!/bin/sh
set -e

echo "==> [Webkita] Starting container initialization..."

# Ensure storage directories exist and have proper permissions
mkdir -p /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# If SQLite is used, ensure database file exists
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    DB_PATH="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
    if [ ! -f "$DB_PATH" ]; then
        echo "==> Creating SQLite database at $DB_PATH..."
        touch "$DB_PATH"
        chown www-data:www-data "$DB_PATH"
        chmod 664 "$DB_PATH"
    fi
fi

# Wait for MySQL if DB_HOST is set and not sqlite
if [ "$DB_CONNECTION" = "mysql" ] && [ -n "$DB_HOST" ]; then
    echo "==> Waiting for MySQL database ($DB_HOST:3306) to be ready..."
    max_tries=30
    count=0
    until nc -z -v -w3 "$DB_HOST" 3306 2>/dev/null || [ $count -gt $max_tries ]; do
        echo "Waiting for database connection... ($count/$max_tries)"
        sleep 2
        count=$((count + 1))
    done
    if [ $count -gt $max_tries ]; then
        echo "Warning: Database connection timed out, continuing anyway..."
    else
        echo "==> Database connection established."
    fi
fi

# Storage symlink
php artisan storage:link --force || true

# Run database migrations
echo "==> Running database migrations..."
php artisan migrate --force || true

# Optimization caches if production
if [ "$APP_ENV" = "production" ]; then
    echo "==> Optimizing caches for production..."
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

echo "==> [Webkita] Application ready! Executing command: $@"
exec "$@"
