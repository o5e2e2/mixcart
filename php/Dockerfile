FROM php:7.3-fpm-alpine

ENV PATH=${PATH}:/app/vendor/bin

# install xdebug 3.0
RUN apk add --no-cache git $PHPIZE_DEPS \
    && git clone -b 3.0.0 --depth 1 https://github.com/xdebug/xdebug.git /usr/src/php/ext/xdebug \
    && docker-php-ext-configure xdebug --enable-xdebug-dev \
    && docker-php-ext-install xdebug \
    && mkdir /tmp/debug

RUN docker-php-ext-install pdo_mysql
