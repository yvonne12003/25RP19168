FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy application files
COPY src/ /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Expose port
EXPOSE 80
