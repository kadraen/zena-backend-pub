FROM php:8.4-cli-alpine
RUN apk add --no-cache git unzip \
 && docker-php-ext-install pdo_mysql
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_CACHE_DIR=/composer-cache
WORKDIR /app
EXPOSE 8000
# --no-reload: without it, artisan serve drops environment variables set by compose
# (DB_HOST=db) and reads only .env. The cost: after editing .env, restart the app.
CMD ["sh", "-c", "composer install && php artisan serve --host=0.0.0.0 --port=8000 --no-reload"]
