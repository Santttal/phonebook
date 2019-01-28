FROM mileschou/phalcon:7.2-fpm

WORKDIR /var/www

RUN docker-php-ext-install pdo_mysql && docker-phalcon-install-devtools

RUN pecl install redis-4.0.1 \
    && docker-php-ext-enable redis
