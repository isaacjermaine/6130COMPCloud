FROM php:8.1-rc-apache
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt update \
  && apt install git unzip --no-install-recommends openssl libssl-dev libcurl4-openssl-dev -y \
  && pecl install mongodb \
  && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
  && echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini \
  && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && composer require mongodb/mongodb
COPY src/ /var/www/html/
WORKDIR /var/www/html
EXPOSE 80