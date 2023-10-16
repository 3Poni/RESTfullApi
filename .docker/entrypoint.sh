#!/bin/bash

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
fi

chown -R www-data:www-data *

php-fpm -D

tail -f /dev/null
