FROM --platform=linux/arm64 php:8.0-fpm

ENV COMPOSER_MEMORY_LIMIT='-1'

RUN apt-get update && \
    apt-get install -y --force-yes --no-install-recommends \
        libpq-dev \
        git \
        unzip

RUN docker-php-ext-install pdo_pgsql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

RUN . ~/.bashrc

RUN rm -r /var/lib/apt/lists/*

WORKDIR /var/www

EXPOSE 9000
CMD ["php-fpm"]
