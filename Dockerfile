# Imagen base con PHP 5.6 y Apache
FROM php:5.6-apache

# Copia todos los archivos del proyecto al servidor web dentro del contenedor
COPY . /var/www/html/

# Expone el puerto 80 para acceder desde el navegador
EXPOSE 80