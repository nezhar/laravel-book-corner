FROM php:7-fpm

RUN apt-get update && apt-get install -y wget libmcrypt-dev git zip libzip-dev sudo libpq-dev --no-install-recommends

COPY php.ini /usr/local/etc/php

RUN docker-php-ext-install pdo pdo_pgsql zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '$(wget -q -O - https://composer.github.io/installer.sig)') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --filename=composer --install-dir=/usr/local/bin \
    && php -r "unlink('composer-setup.php');"

# Add laravel/installer
RUN composer global require laravel/installer

# Install entrypoint script
COPY entrypoint /usr/local/bin/
RUN chmod a+x /usr/local/bin/entrypoint

EXPOSE 9000
CMD ["php-fpm"]

ENTRYPOINT [ "/bin/bash", "/usr/local/bin/entrypoint" ]