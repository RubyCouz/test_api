# API_Test
#
# VERSION               0.1

FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql opcache
RUN apk update && apk add --no-cache git unzip bash

WORKDIR /code

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./composer.json .
COPY ./composer.lock .

RUN composer install
