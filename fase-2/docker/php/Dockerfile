# Archivo: docker/php/Dockerfile
# Objetivo: construir la imagen de desarrollo PHP + Apache para la fase 2.
# Contexto: incluye extensiones para conexion MySQL mediante mysqli y PDO.
FROM php:8.2-apache

# Paso 1: instalar utilidades del sistema y extensiones PHP requeridas.
RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libzip-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Paso 2: definir el directorio de trabajo servido por Apache.
WORKDIR /var/www/html
