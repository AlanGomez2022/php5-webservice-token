# Imagen base con PHP 5.6 y Apache
FROM php:5.6-apache

# (opcional) Instalar extensiones que necesites
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite si lo usás
RUN a2enmod rewrite

# Copiar todo el proyecto
COPY . /var/www/html/

# ✅ Cambiar el propietario al usuario de Apache
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html


# Cambiar el DocumentRoot de Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 80 para acceder desde el navegador
EXPOSE 80