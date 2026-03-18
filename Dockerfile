# Stage 1: Composer
FROM docker.io/library/composer:latest AS composer

# Stage 2: PHP
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copy Composer binary
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy only composer files first (cache optimization)
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copy project files
COPY . .

# Fix permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache \
    && chmod 1777 /tmp

# Optional: optimize Laravel (safe)
RUN php artisan config:clear || true \
    && php artisan cache:clear || true

# Switch to non-root user (optional but good practice)
USER www-data

CMD ["php-fpm"]