FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        git \
        unzip \
        libpq-dev \
        libzip-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libwebp-dev \
        && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install -j$(nproc) \
        zip \
        pdo_mysql \
        pdo_pgsql \
        pgsql \
        exif \
        bcmath \
        gd \
    && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN groupmod -o -g 1000 www-data && \
    usermod -o -u 1000 -g www-data www-data

CMD ["php-fpm"]

WORKDIR /var/www
