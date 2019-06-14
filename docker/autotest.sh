#!/bin/bash

cd /var/www/html

rm -rf bootstrap/cache/*.php
composer install &&
composer dumpautoload &&
php artisan migrate &&
php artisan cache:clear &&
php artisan config:clear &&
## On production don't need test
/var/www/html/vendor/bin/phpunit || exit 1
