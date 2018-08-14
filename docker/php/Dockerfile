FROM php:7.2-cli-stretch

WORKDIR /var/www/

RUN apt-get update \
    && apt-get install -y librdkafka-dev wget git

RUN docker-php-ext-install opcache

RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/1b137f8bf6db3e79a38a5bc45324414a6b1f9df2/web/installer -O - -q | php -- --quiet
RUN mv composer.phar /usr/bin/composer