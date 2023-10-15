#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
    php artisan key:generate
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
fi

if [ ! -f "node_modules/.package-lock.json" ]; then
    npm install
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
fi

chmod -R 777 storage bootstrap/cache

php-fpm -D

tail -f /dev/null
