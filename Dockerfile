# Use the official PHP image with Apache support
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

COPY ./infra/default.conf /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container
COPY . /var/www/html

# Set appropriate permissions for the working directory
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
