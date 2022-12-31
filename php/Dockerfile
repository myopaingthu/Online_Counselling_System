FROM php:8.0.7-fpm-alpine

# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apk update
RUN apk add zip
RUN apk add unzip
RUN apk add vim
RUN apk add git
RUN apk add mysql-client
RUN apk add --update --no-cache oniguruma-dev
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apk add nodejs npm

# Set working directory
WORKDIR /var/www/html

RUN mkdir -p /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage

RUN mkdir -p /var/log/operation-log
RUN chmod -R 777 /var/log/operation-log

COPY ./php/php.ini /usr/local/etc/php/php.ini
COPY ./php/www-fpm.conf /usr/local/etc/php-fpm.d/zzz-docker.conf

RUN docker-php-source extract 
