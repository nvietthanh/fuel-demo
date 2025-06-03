FROM php:8.1-fpm-alpine

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache \
    bash \
    icu-dev \
    zlib-dev \
    libzip-dev \
    libpng-dev \
    oniguruma-dev \
    mysql-client \
    libxml2-dev \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
    && rm -rf /var/cache/apk/*
