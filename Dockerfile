FROM php:8.1.0-fpm

ADD ./.docker/php/php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y curl git zip libpq-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql bcmath

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data

ENTRYPOINT [ ".docker/entrypoint.sh" ]


