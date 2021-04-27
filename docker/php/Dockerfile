FROM php:7.4-fpm-buster

## Tools
# Install some tools
RUN apt-get update && apt-get install -y \
    apt-utils \
    bash \
    git \
    patch \
    unzip

## Default user
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

## PHP
# Copy this amazing tools
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
# Add some PHP extensions
RUN install-php-extensions \
    opcache \
    pdo_mysql \
    xdebug \
    xsl

## Commposer
# Copy composer bin
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer
# Configure composer
ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/tmp

## Cleaning
RUN rm -rf /tmp/* /var/list/apt/* \
    && apt-get clean -y && apt-get autoclean -y && apt-get autoremove -y

## Default User
USER www-data
