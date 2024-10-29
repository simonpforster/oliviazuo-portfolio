FROM node:current-alpine3.20 as packages

RUN npm i -g uglify-js

FROM packages as minifier

COPY src/resources/js/**.js src/
RUN chmod 755 src/**.js

RUN ["npx", "uglify-js", "src/image.js", "-o", "image.js", "-c", "toplevel", "-m", "toplevel", "-p", "bare_returns"]
RUN ["npx", "uglify-js", "src/solid-gallery.js", "-o", "solid-gallery.js", "-c", "toplevel", "-m", "toplevel", "-p", "bare_returns"]

FROM php:8.3-apache
LABEL authors="simonpforster"

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY src/ /var/www/html/
COPY --from=minifier **.js /var/www/html/resources/js/