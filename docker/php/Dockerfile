# docker/php/Dockerfile

# Start from official PHP 8.3 FPM image
FROM php:8.3-fpm

# Set working directory inside container
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions Laravel needs
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Redis PHP extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install Composer (PHP package manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create a non-root user (security best practice)
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Give ownership of the working directory to our user
RUN chown -R www:www /var/www

# Switch to the non-root user
USER www

# Expose port 9000 (PHP-FPM listens here)
EXPOSE 9000