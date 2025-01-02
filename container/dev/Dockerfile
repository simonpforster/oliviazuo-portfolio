FROM composer AS precomposer

COPY / /oliviazuo-portfolio
COPY /php.ini /usr/local/etc/php/php-cli.ini
WORKDIR /oliviazuo-portfolio/src

RUN set -eux; \
    apk update; \
    apk add libffi-dev; \
    docker-php-ext-install ffi

RUN composer install

FROM php:8.3-apache AS runnerbase
RUN set -eux; \
    apt-get update; \
    apt-get install libffi-dev; \
    rm -rf /var/lib/apt/lists/*; \
    docker-php-ext-install ffi

FROM runnerbase AS runner
LABEL authors="simonpforster"

COPY ../../php.ini "$PHP_INI_DIR/php.ini"
COPY ../../apache2.conf /etc/apache2/apache2.conf

COPY --from=precomposer /oliviazuo-portfolio/src/vendor /var/www/vendor

RUN a2enmod rewrite
RUN mkdir /var/database
RUN chown -R root:root /var/database
RUN chmod 777 /var/database
