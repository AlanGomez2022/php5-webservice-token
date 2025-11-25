# php5-webservice-token

**Proyecto personal:** Web service con token (modo Sith) ⚫

## Objetivo
Crear un pequeño web service en PHP5 que devuelva datos en formato JSON y valide un token de acceso.  
Este proyecto forma parte de mi entrenamiento en PHP5 y manejo de APIs.

## Estado ⌛

## Día 1: Repo creado ✅
- README inicial creado ✅
- Primer archivo PHP con prueba de JSON creado ✅

## Día 2: Metodo GET y POST ✅
- se prueba GET y POST
- se crea HTML con form

## Día 3: iniciando con un TOKEN ✅
- creamos un auth.php que genera un token aleaorio en un archivo token.json
- ese token se compara en api.php con el que ingresa la persona y devuelve la respuesta del web service.
- al html form que teniamos le agregamos el campo para que la persona ingrese el token.
- comenzamos a utilizar POSTMAN 
- como desafio controlamos expiracion del toke por 5 min.

### Día 4 — Docker con PHP 5.6
- Se creó un Dockerfile para levantar el proyecto en un contenedor.
- Se generó la imagen `webservice-php5`.
- El servicio corre correctamente en `http://localhost:8080`.

### Día 5 — Reestructuración del proyecto
- Se organizaron las carpetas en `/api`, `/config`, `/lib`, `/public`.
- Se modularizaron las funciones en `lib/token.php`.
- Se ajustó el Dockerfile para reflejar la nueva estructura.

## Día 6 — Incorporación de docker-compose 🚀

Se agregó un archivo `docker-compose.yml` para administrar el proyecto completo de manera más simple.  
A partir de ahora, **ya no se usa Docker Desktop para darle “Play” a la imagen**: todo se maneja con `docker compose`.

### ✔ ¿Para qué sirve docker-compose?
- Levanta el proyecto completo con un solo comando  
- Usa el Dockerfile automáticamente  
- Expone puertos  
- Monta la carpeta local dentro del contenedor (hot reload)  
- Permite administrar fácilmente contenedores, logs y reinicios  
- Escala a múltiples servicios (MariaDB, phpMyAdmin, Redis, etc.)

### 📌 Archivo `docker-compose.yml` utilizado

```yaml
version: '3'
services:
  web:
    build: .
    image: webservice-php5
    container_name: webservice-php5
    ports:
      - "8080:80"
    volumes:
      - ./:/var/www/html
    restart: unless-stopped
