FROM php:8.1.0-fpm

ADD ./.docker/php/php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y curl git --yes zip unzip --yes libpq-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql bcmath

COPY --from=composer /usr/bin/composer /usr/bin/composer
#
COPY . /var/www/html
#
ENV COMPOSER_ALLOW_SUPERUSER=1

ENTRYPOINT [ ".docker/entrypoint.sh" ]



