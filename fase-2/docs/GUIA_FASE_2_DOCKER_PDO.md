# Guia Educativa Fase 2 · Docker + MySQL + PDO

[![Docker Compose](https://img.shields.io/badge/Docker%20Compose-Stack-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/)
[![PHP PDO](https://img.shields.io/badge/PHP-PDO-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/book.pdo.php)

Guia para entender los cambios tecnicos de Fase 2 respecto a Fase 1.

## Indice

- [Objetivo](#objetivo)
- [Que cambia respecto a Fase 1](#que-cambia-respecto-a-fase-1)
- [Cambios en docker-composeyml](#cambios-en-docker-composeyml)
- [Cambios en Dockerfile y PHP](#cambios-en-dockerfile-y-php)
- [Flujo recomendado](#flujo-recomendado)
- [Errores frecuentes](#errores-frecuentes)

## Objetivo

Pasar de una app PHP aislada a una app con base de datos real usando PDO.

## Que cambia respecto a Fase 1

| Tema | Fase 1 | Fase 2 |
|---|---|---|
| Servicios | `app`, `composer` | `app`, `db`, `phpmyadmin`, `composer` |
| Puerto web | `8080` | `8082` |
| Base de datos | No | MySQL 8.x |
| Interfaz admin | No | phpMyAdmin |
| Codigo PHP | Hola mundo | Conexion PDO + consulta SQL |

## Cambios en docker-compose.yml

### Servicio `db`

- Aporta MySQL para persistencia.
- Se configura con variables (`MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD`).

### Servicio `phpmyadmin`

- Permite inspeccionar tablas y datos de forma visual.

### `depends_on` en `app`

- Ordena el arranque para depender de `db`.

### Volumen persistente `db_data`

- Conserva datos entre reinicios de contenedores.

### Inicializacion SQL

- `docker/mysql/init.sql` se ejecuta al primer arranque para crear estructura/datos iniciales.

### Servicio `composer`

- Se mantiene como utilidad para dependencias:

```bash
docker compose run --rm composer install
docker compose run --rm composer require vendor/paquete
```

## Cambios en Dockerfile y PHP

- Dockerfile mantiene extensiones para BD (`pdo`, `pdo_mysql`, `mysqli`).
- `src/index.php` crea conexion PDO al host `db` y ejecuta una consulta.

## Flujo recomendado

1. Levanta entorno con `docker compose up -d --build`.
2. Prueba app en [http://localhost:8082](http://localhost:8082).
3. Revisa BD en [http://localhost:8083](http://localhost:8083).
4. Modifica datos y valida cambios en la app.

## Errores frecuentes

- Conexion PDO fallida: revisa credenciales y espera a que `db` este lista.
- Tabla no creada: valida montaje de `init.sql` y reinicia entorno.
- Puerto ocupado: cambia puertos publicados en Compose.
- Composer no encuentra `composer.json`: revisa `working_dir` y volumen de `composer`.

## Cierre

Esta fase introduce una arquitectura web real (app + BD + admin) como base para practicar CRUD en las siguientes actividades.
