FROM php:8.3-apache
LABEL authors="simonpforster"

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY src/ /var/www/html/