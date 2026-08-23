FROM php:8.1-cli

RUN apt-get update && apt-get install -y git zip unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app