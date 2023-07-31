FROM --platform=amd64 php:8.2-cli

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && apt-get upgrade --assume-yes \
    && DEBIAN_FRONTEND=noninteractive apt-get install --assume-yes --no-install-recommends \
    libfreetype-dev libjpeg62-turbo-dev libpng-dev libonig-dev libcurl4-gnutls-dev \
    libxml++2.6-dev libpq-dev libzip-dev git

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring curl xml zip opcache pdo pdo_mysql

RUN  useradd -ms /bin/bash deming
RUN mkdir -p /var/www/deming 
COPY deming.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/deming

RUN git clone https://www.github.com/dbarzin/deming .
RUN mkdir -p storage/framework/views && mkdir -p storage/framework/cache && mkdir -p storage/framework/sessions && mkdir -p bootstrap/cache
RUN chmod -R 775 /var/www/deming/storage && chown -R www-data:www-data /var/www/deming
RUN composer install
RUN php artisan vendor:publish --all

RUN cp .env.example .env
RUN sed -i 's/DB_HOST=127\.0\.0\.1/DB_HOST=mysql/' .env

COPY entrypoint.sh /opt/entrypoint.sh
RUN chmod u+x /opt/entrypoint.sh

ENTRYPOINT "/opt/entrypoint.sh"
