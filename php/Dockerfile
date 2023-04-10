#FROM php:7.0-fpm
FROM nanoninja/php-fpm:8.1
RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y \
    ffmpeg \
    x264 \
    x265 \
    nano

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

