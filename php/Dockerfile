FROM php:7.3-fpm-alpine

ENV PATH=${PATH}:/app/vendor/bin

# install xdebug 3.0
RUN apk add --no-cache git $PHPIZE_DEPS \
    && git clone -b 3.0.0 --depth 1 https://github.com/xdebug/xdebug.git /usr/src/php/ext/xdebug \
    && docker-php-ext-configure xdebug --enable-xdebug-dev \
    && docker-php-ext-install xdebug \
    && mkdir /tmp/debug

RUN docker-php-ext-install pdo_mysql

## Install PHP XSL extension
RUN set -xe; \
    \
    apk --update add --no-cache --virtual .php-ext-install-deps \
        $PHPIZE_DEPS \
        # xsl deps
        libxslt-dev \
        libgcrypt-dev \
    \
    && docker-php-ext-install -j$(nproc) \
        xsl \
    && docker-php-source delete \
    \
    && runDeps="$( \
        scanelf --needed --nobanner --format '%n#p' --recursive /usr/local \
            | tr ',' '\n' \
            | sort -u \
            | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )" \
    && apk add --no-cache $runDeps \
    \
    && apk del --no-network .php-ext-install-deps
