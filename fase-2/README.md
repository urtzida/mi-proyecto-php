# Fase 2 · PHP + MySQL (PDO)

[![Docker](https://img.shields.io/badge/Docker-Multi%20Container-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/)
[![PDO](https://img.shields.io/badge/PHP-PDO-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/book.pdo.php)

Objetivo: conectar la app PHP con MySQL usando PDO en un entorno Docker.

## Indice

- [Inicio rapido](#inicio-rapido)
- [Accesos](#accesos)
- [Credenciales de base de datos](#credenciales-de-base-de-datos)
- [Guia educativa](#guia-educativa)
- [Parar servicios](#parar-servicios)

## Inicio rapido

```bash
cd fase-2
docker compose up -d --build
docker compose ps
```

## Accesos

- App: [http://localhost:8082](http://localhost:8082)
- phpMyAdmin: [http://localhost:8083](http://localhost:8083)

## Credenciales de base de datos

- Host (desde PHP): `db`
- Puerto interno: `3306`
- Base de datos: `imaw`
- Usuario: `imaw`
- Password: `imaw`
- Root: `root` / `root`

## Guia educativa

- [Guia Fase 2 (Docker + MySQL + PDO)](./docs/GUIA_FASE_2_DOCKER_PDO.md)

## Parar servicios

```bash
docker compose down
```
