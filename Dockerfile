FROM composer as composer
COPY composer.json composer.lock ./
RUN composer install --ignore-platform-reqs --no-scripts

# Install Apache, copy src files
FROM php:7.2.34-apache  AS apacheInstall

COPY src/ /var/www/html/
COPY --from=composer /app/src/vendor /var/www/html/vendor
EXPOSE 80
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]