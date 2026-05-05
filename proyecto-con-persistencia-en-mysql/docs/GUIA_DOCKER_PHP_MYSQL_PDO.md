# Guía educativa del Proyecto con persistencia en MySQL · Docker + MySQL + PDO

[![Docker Compose](https://img.shields.io/badge/Docker%20Compose-Stack-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/)
[![PHP PDO](https://img.shields.io/badge/PHP-PDO-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/book.pdo.php)

Guía para entender los cambios técnicos del Proyecto con persistencia en MySQL respecto al Proyecto sin persistencia (sin BBDD).

## Índice

- [Objetivo](#objetivo)
- [Qué cambia respecto a Proyecto sin persistencia (sin BBDD)](#qué-cambia-respecto-a-proyecto-sin-persistencia-sin-bbdd)
- [Cambios en docker-compose.yml](#cambios-en-docker-composeyml)
- [Cambios en Dockerfile y PHP](#cambios-en-dockerfile-y-php)
- [Flujo recomendado](#flujo-recomendado)
- [Errores frecuentes](#errores-frecuentes)

## Objetivo

Pasar de una app PHP aislada a una app con base de datos real usando PDO.

## Qué cambia respecto a Proyecto sin persistencia (sin BBDD)

| Tema | Proyecto sin persistencia (sin BBDD) | Proyecto con persistencia en MySQL |
|---|---|---|
| Servicios | `app`, `composer` | `app`, `db`, `phpmyadmin`, `composer` |
| Puerto web | `8080` | `8082` |
| Base de datos | No | MySQL 8.x |
| Interfaz admin | No | phpMyAdmin |
| Código PHP | Hola mundo | Conexión PDO + consulta SQL |

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

### Inicialización SQL

- `docker/mysql/init.sql` se ejecuta al primer arranque para crear estructura y datos iniciales.

### Servicio `composer`

- Se mantiene como utilidad para dependencias:

```bash
docker compose run --rm composer install
docker compose run --rm composer require vendor/paquete
```

## Cambios en Dockerfile y PHP

- Dockerfile mantiene extensiones para BD (`pdo`, `pdo_mysql`, `mysqli`).
- `src/index.php` crea conexión PDO al host `db` y ejecuta una consulta.

### Por qué no se recomienda generar `settings.json` desde PHP en este proyecto

En el proyecto sin persistencia, el archivo de configuración era simple y no contenía integración real con servicios externos.
En este proyecto sí hay base de datos, credenciales y despliegue en contenedores, por lo que el enfoque recomendado cambia.

- La configuración debe venir del entorno (variables en `docker-compose.yml`), no de archivos generados en caliente.
- Generar archivos desde PHP dentro del contenedor introduce problemas de permisos de escritura.
- Es fácil terminar guardando credenciales en disco por duplicado (riesgo de seguridad y mantenimiento).
- Rompe la reproducibilidad: dos contenedores iguales podrían quedar con configuraciones distintas según ejecución.
- Se aleja del patrón de infraestructura inmutable (el contenedor debe arrancar siempre con el mismo comportamiento).

### Recomendación práctica

- Define credenciales y host de BD en variables de entorno del servicio `app`.
- En PHP, lee esas variables con `$_ENV` o `getenv()` y construye la conexión PDO.
- Evita crear o modificar archivos de configuración en tiempo de ejecución.

## Flujo recomendado

1. Levanta entorno con `docker compose up -d --build`.
2. Prueba app en [http://localhost:8082](http://localhost:8082).
3. Revisa BD en [http://localhost:8083](http://localhost:8083).
4. Modifica datos y valida cambios en la app:
   - Desde **phpMyAdmin** ([http://localhost:8083](http://localhost:8083)): usa la interfaz visual para ejecutar sentencias `INSERT`, `UPDATE` o `DELETE` directamente sobre las tablas.
   - Desde **`src/index.php`**: añade operaciones CRUD con PDO y recarga [http://localhost:8082](http://localhost:8082) para comprobar el resultado.
   - Usa phpMyAdmin para **verificar** que los cambios realizados desde PHP se han persistido correctamente en la BD.

## Errores frecuentes

- Conexión PDO fallida: revisa credenciales y espera a que `db` esté lista.
- Tabla no creada: valida montaje de `init.sql` y reinicia entorno.
- Puerto ocupado: cambia puertos publicados en Compose.
- Composer no encuentra `composer.json`: revisa `working_dir` y volumen de `composer`.

## Cierre

Este proyecto introduce una arquitectura web real (app + BD + admin) como base para practicar **CRUD** en las siguientes actividades.

**CRUD** es el acrónimo de las cuatro operaciones básicas sobre datos persistentes:

| Letra | Operación | SQL equivalente |
|-------|-----------|-----------------|
| **C** | Create (crear) | `INSERT` |
| **R** | Read (leer) | `SELECT` |
| **U** | Update (actualizar) | `UPDATE` |
| **D** | Delete (eliminar) | `DELETE` |

