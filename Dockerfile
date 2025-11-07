# Imagen base con PHP 5.6 y Apache
FROM php:5.6-apache

# (opcional) Instalar extensiones que necesites
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite si lo usás
RUN a2enmod rewrite

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 80 para acceder desde el navegador
EXPOSE 80