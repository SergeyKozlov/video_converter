FROM nanoninja/php-fpm:8.1

LABEL maintainer="Sergey Kozlov <hello@sergeykozlov.ru>"
LABEL autors="Sergey Kozlov <hello@sergeykozlov.ru>"

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


#WORKDIR /

#ADD . .