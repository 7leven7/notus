FROM php:8.2-fpm-alpine

RUN apk update && apk add \
    build-base \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    oniguruma-dev \
    curl

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd
RUN docker-php-ext-install gd

RUN apk add autoconf && pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis && apk del autoconf


RUN curl -s https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer about