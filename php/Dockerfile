# image docker pour php 
FROM php:8.1-fpm

RUN apt-get update 
RUN apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \ 
    && docker-php-ext-enable apcu \ 
    && docker-php-ext-configure zip \ 
    && docker-php-ext-install zip 

WORKDIR /var/www/symfo 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN git config --global user.email "william_jaulin@yahoo.fr" \ 
    && git config --global user.name "ElFamosoWilli"          