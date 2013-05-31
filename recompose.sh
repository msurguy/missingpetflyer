#!/bin/bash
if grep -F "YourSecretKey!!!" ./app/config/app.php; then php artisan key:generate; fi;
rm -rf vendor
rm -rf composer.lock
if [ ! -f composer.phar ]; then curl -s http://getcomposer.org/installer | php; fi;
php composer.phar install --prefer-source
php composer.phar dump-autoload
php artisan optimize