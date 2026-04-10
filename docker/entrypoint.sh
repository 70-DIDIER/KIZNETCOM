#!/bin/sh
set -e

cd /var/www/html

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Run migrations
php artisan migrate --force

# Create storage symlink for public files
php artisan storage:link --force 2>/dev/null || true

# Cache config/routes/views in production
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Start supervisor (nginx + php-fpm + queue)
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
