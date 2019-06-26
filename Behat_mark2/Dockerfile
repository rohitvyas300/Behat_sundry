FROM alpine:latest
MAINTAINER rohit vyas

# Install PHP7 with needed exstentions and composer with hirak/prestissimo.
RUN apk add --update \
    php7-dom \
    php7-curl \
    php7-json \
    php7-phar \
    php7-openssl \
    php7-mbstring \
    php7-ctype \
    php7-pdo_mysql \
    php7-session \
    php7-zip \
    php7-bcmath \
    php7-tokenizer \
    curl \
    && rm -fr /var/cache/apk/* \
    && curl -sS https://getcomposer.org/installer | php -- --filename=composer \
    --install-dir=/usr/bin --version=1.0.0 \
    && composer global require "hirak/prestissimo:^0.3"

# Add files and folders to container.
ADD ["composer.json", 'seleniumServer3.5.3.jar', "/e2e/"]
WORKDIR /e2e

# Install and initialize Behat.
RUN composer install \
    && ./vendor/bin/behat --init

RUN echo "Hello Testes, I'm almost there, please wait..."
    
ENTRYPOINT ["/e2e"]