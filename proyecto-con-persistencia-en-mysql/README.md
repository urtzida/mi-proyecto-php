# Proyecto con persistencia en MySQL · PHP + MySQL (PDO)

[![Docker](https://img.shields.io/badge/Docker-Multi%20Container-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/)
[![PDO](https://img.shields.io/badge/PHP-PDO-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/book.pdo.php)

Objetivo: conectar la app PHP con MySQL usando PDO en un entorno Docker.

Aquí ya trabajas con una arquitectura más real: aplicación, base de datos y panel de administración.

## Índice

- [Inicio rápido](#inicio-rápido)
- [Accesos](#accesos)
- [Credenciales de base de datos](#credenciales-de-base-de-datos)
- [Guía educativa](#guía-educativa)
- [Parar servicios](#parar-servicios)

## Inicio rápido

```bash
cd proyecto-con-persistencia-en-mysql
docker compose up -d --build
docker compose ps
```

El arranque puede tardar algo más que en Proyecto sin persistencia (sin BBDD) porque MySQL necesita inicializar volumen y scripts.

## Accesos

- App: [http://localhost:8082](http://localhost:8082)
- phpMyAdmin: [http://localhost:8083](http://localhost:8083)

## Credenciales de base de datos

- Host (desde PHP): `db`
- Puerto interno: `3306`
- Base de datos: `imaw`
- Usuario: `imaw`
- Password: `imaw`
- Root: `root` / `root` (solo para acceder a phpMyAdmin como administrador)

Importante: el nombre de host `db` es el nombre del servicio MySQL dentro de la red interna de Docker. Solo es accesible desde otros contenedores del mismo `docker-compose.yml` (por eso se usa en `src/index.php`). Desde tu PC, ese nombre no existe; si quisieras conectarte con un cliente externo como DBeaver o TablePlus, usarías `localhost` y el puerto publicado en Compose:

| Contexto | Host | Puerto |
|----------|------|--------|
| Desde PHP (dentro de Docker) | `db` | `3306` |
| Desde tu PC (cliente externo) | `localhost` | `3307` |

## Guía educativa

- [Guía Proyecto con persistencia en MySQL (Docker + MySQL + PDO)](./docs/GUIA_DOCKER_PHP_MYSQL_PDO.md)

## Parar servicios

```bash
docker compose down
```

`down` no borra datos del volumen por defecto. Eso permite parar y seguir después sin perder contenido de las tablas MySQL.
