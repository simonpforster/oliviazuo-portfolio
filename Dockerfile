FROM node:current-alpine3.20 AS packages

RUN npm i -g uglify-js
RUN npm i -g css-minify

RUN apk add util-linux

FROM packages AS minifier

COPY src/html/resources/js/**.js src/js/
COPY src/html/resources/styles/**.css src/styles/
COPY src/html/resources/styles/page/**.css src/styles/page/

RUN chmod 755 src/js/**.js
RUN chmod 755 src/styles/**.css
RUN chmod 755 src/styles/page/**.css

RUN ["npx", "uglify-js", "src/js/image.js", "-o", "image.js", "-c", "toplevel", "-m", "toplevel", "-p", "bare_returns"]
RUN ["npx", "uglify-js", "src/js/solid-gallery.js", "-o", "solid-gallery.js", "-c", "toplevel", "-m", "toplevel", "-p", "bare_returns"]

RUN npx css-minify -d src/styles -o styles
RUN npx css-minify -d src/styles/page -o styles/page

RUN rename .min.css .css styles/*.min.css
RUN rename .min.css .css styles/page/*.min.css

FROM php:8.3-apache
LABEL authors="simonpforster"

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY src/ /var/www/
COPY --from=minifier **.js /var/www/html/resources/js/
COPY --from=minifier styles/**.css /var/www/html/resources/styles/
COPY --from=minifier styles/page/**.css /var/www/html/resources/styles/page/
