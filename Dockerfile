# ==========================================
# Stage 1: Build Frontend Assets via Vite
# ==========================================
FROM node:22-bookworm-slim AS frontend-builder

WORKDIR /app

# Cache package installation
COPY package.json package-lock.json ./
RUN npm ci

# Copy configuration and frontend source files
COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY public ./public

# Build production assets
RUN npm run build

# ==========================================
# Stage 2: Production PHP-FPM + Nginx Runtime
# ==========================================
FROM php:8.4-fpm-bookworm AS production

LABEL maintainer="Pajaken Team"
LABEL description="Production Docker image for Pajaken (Laravel 13)"

# Avoid interaction prompts during apt installation
ENV DEBIAN_FRONTEND=noninteractive

# Install system dependencies & web server
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    gettext-base \
    ca-certificates \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    curl \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        bcmath \
        intl \
        gd \
        zip \
        exif \
        opcache \
        pcntl \
    && rm -rf /var/lib/apt/lists/* \
    && rm -f /etc/nginx/sites-enabled/default

# Install official Composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Leverage Docker cache for PHP dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# Copy application source code
COPY . .

# Copy compiled frontend assets from frontend-builder stage
COPY --from=frontend-builder /app/public/build ./public/build

# Complete Composer autoloader and package discovery
RUN composer dump-autoload --optimize --no-dev \
    && php artisan package:discover --ansi \
    && rm -rf /root/.composer

# Copy configuration files and entrypoint
COPY docker/php.ini /usr/local/etc/php/conf.d/pajaken.ini
COPY docker/nginx.conf.template /etc/nginx/templates/default.conf.template
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Prepare storage & cache directories with appropriate permissions
RUN mkdir -p storage/framework/sessions \
             storage/framework/views \
             storage/framework/cache/data \
             storage/logs \
             bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Default port (overridden by Render via $PORT environment variable)
ENV PORT=8080
EXPOSE 8080

# Health check using Laravel /up endpoint
HEALTHCHECK --interval=30s --timeout=5s --start-period=15s --retries=3 \
    CMD curl -f http://127.0.0.1:${PORT}/up || exit 1

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
