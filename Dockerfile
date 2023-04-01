FROM composer:latest
WORKDIR /home/chernanat/Desktop/development/prueba_tecnica_psicol/
RUN composer install --no-scripts
COPY composer.json /home/chernanat/Desktop/development/prueba_tecnica_psicol/
# COPY . .
RUN php artisan serve
EXPOSE 8001
COPY . .
# RUN php artisan serve