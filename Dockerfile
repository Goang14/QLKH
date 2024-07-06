FROM --platform=linux/amd64 wyveo/nginx-php-fpm:php81
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY ./composer.json /usr/share/nginx/html
COPY ./ /usr/share/nginx/html
WORKDIR /usr/share/nginx/html
RUN composer install
RUN cp .env.example .env
RUN php artisan key:generate
RUN apt-key adv --fetch-keys https://packages.sury.org/php/apt.gpg
RUN apt-get update
EXPOSE 80
