#!/usr/bin/env bash
set -e

# Default PORT to 8080 if not set (Render injects $PORT at runtime)
export PORT="${PORT:-8080}"

# Substitute PORT in Nginx configuration template
if [ -f /etc/nginx/templates/default.conf.template ]; then
    envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf
fi

# Ensure storage and bootstrap directories exist with proper permissions
mkdir -p /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Ensure storage link exists
if [ ! -L /var/www/html/public/storage ]; then
    php artisan storage:link --no-interaction 2>/dev/null || true
fi

# In production with an APP_KEY configured, cache routes and views
if [ "${APP_ENV}" = "production" ] && [ -n "${APP_KEY}" ]; then
    echo "Running production route & view cache..."
    php artisan route:cache --no-interaction || true
    php artisan view:cache --no-interaction || true
fi

# Optional auto-migration on deployment (e.g. Render)
if [ "${AUTO_MIGRATE}" = "true" ]; then
    echo "AUTO_MIGRATE=true detected: running database migrations..."
    php artisan migrate --force --no-interaction || true
fi

# If arguments are passed to entrypoint (e.g. docker run ... php artisan migrate), run them
if [ "$#" -gt 0 ]; then
    exec "$@"
fi

# Start services for Web Application
echo "Starting Pajaken on 0.0.0.0:${PORT}..."

php-fpm -F &
PHP_FPM_PID=$!

nginx -g "daemon off;" &
NGINX_PID=$!

term_handler() {
    echo "Shutdown signal received. Stopping services gracefully..."
    kill -QUIT "$NGINX_PID" 2>/dev/null || true
    kill -QUIT "$PHP_FPM_PID" 2>/dev/null || true
    wait "$NGINX_PID" 2>/dev/null || true
    wait "$PHP_FPM_PID" 2>/dev/null || true
    exit 0
}

trap term_handler SIGTERM SIGINT SIGQUIT

# Wait for either process to exit
wait -n "$NGINX_PID" "$PHP_FPM_PID"
