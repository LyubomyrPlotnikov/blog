FROM php:7.3-fpm

RUN apt-get update \
	&& apt-get install -y git nodejs zlib1g-dev libxml2 libxml2-dev libcurl4-openssl-dev pkg-config libssl-dev\
    && apt-get install -y libmcrypt-dev libreadline-dev libzip-dev\
    && docker-php-ext-install -j$(nproc) zip bcmath calendar fileinfo gettext iconv json mbstring pcntl pdo \
    pdo_mysql mysqli soap tokenizer zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
	&& pecl install mongodb \
    && docker-php-ext-enable mongodb