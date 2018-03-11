FROM php:7.2-fpm

RUN apt-get update \
	&& apt-get install -y git nodejs zlib1g-dev libxml2 libxml2-dev libcurl4-openssl-dev pkg-config libssl-dev\
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
	&& apt-get install -y libmcrypt-dev libreadline-dev \
	&& docker-php-ext-install -j$(nproc) bcmath calendar fileinfo gettext iconv json mbstring pcntl pdo \
	pdo_mysql mysqli soap tokenizer zip \
	&& pecl install mongodb \
    && docker-php-ext-enable mongodb