
FROM php:8.2-apache

COPY ./000-dafault.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

# Install necessary packages
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    wget \
    git \
    unzip

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql

COPY ./install-composer.sh ./

COPY ./php.ini /usr/local/etc/php/

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh

WORKDIR /var/www/public

RUN chown -R www-data:www-data /var/www
# Entrypoint to set permissions after the container starts
COPY ./set-permissions.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/set-permissions.sh

ENTRYPOINT ["set-permissions.sh"]


# Start Apache in foreground
CMD ["apache2-foreground"]
