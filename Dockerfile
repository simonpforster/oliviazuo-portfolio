FROM node:current-alpine3.20 as minifier

RUN npm i -g google-closure-compiler

COPY src/ /var/www/html/

WORKDIR /var/www/html/js

RUN google-closure- '**.js' --js_output_file out.js

FROM php:8.3-apache
LABEL authors="simonpforster"

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY src/ /var/www/html/