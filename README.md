# IMAW · Docker por Proyectos para PHP

[![Docker](https://img.shields.io/badge/Docker-Containerized-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/docs.php)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/)
[![Estado](https://img.shields.io/badge/Curso-Activo-success)](#inicio-rápido)

Proyecto docente organizado en dos fases progresivas para aprender despliegue con Docker en aplicaciones PHP.

La idea es avanzar por bloques cortos: primero levantar una app PHP sencilla y después añadir base de datos.
Si sigues ese orden, la mayoría de errores serán más fáciles de identificar.

## Índice

- [Autores](#autores)
- [Vista general](#vista-general)
- [Ruta recomendada](#ruta-recomendada)
- [Inicio rápido](#inicio-rápido)
- [Documentación del proyecto](#documentación-del-proyecto)
- [Recursos recomendados](#recursos-recomendados)
- [Comandos útiles](#comandos-útiles)
- [Qué carpeta usar](#qué-carpeta-usar)
- [Parar servicios](#parar-servicios)

## Vista general

Este repositorio separa el aprendizaje en dos bloques independientes:

| Fase | Objetivo | Stack |
|---|---|---|
| `proyecto-sin-persistencia-sin-bbdd` | Primer despliegue de una app PHP | PHP (sin base de datos) |
| `proyecto-con-persistencia-en-mysql` | Integrar persistencia en entorno Docker | PHP + MySQL (PDO) |

## Ruta recomendada

Antes de levantar contenedores, sigue este orden:

1. Revisa la documentación de `proyecto-sin-persistencia-sin-bbdd/docs/`.
2. Verifica que Docker y VS Code estén listos.
3. Arranca el proyecto correspondiente según el nivel que indique la documentación.

Nota: cada fase tiene su propio `docker-compose.yml`, por eso debes ejecutar comandos de Docker compose dentro de la carpeta del proyecto.

## Inicio rápido

### Proyecto sin persistencia (sin BBDD)

```bash
cd proyecto-sin-persistencia-sin-bbdd
docker compose up -d --build
```

Este arranque construye (o actualiza) la imagen de PHP y levanta el contenedor en segundo plano.
El primer arranque suele tardar más porque descarga imágenes.

- Aplicación: [http://localhost:8080](http://localhost:8080)

### Proyecto con persistencia en MySQL

```bash
cd proyecto-con-persistencia-en-mysql
docker compose up -d --build
```

En esta fase se levantan varios servicios coordinados: app PHP, base de datos MySQL y phpMyAdmin.
Si la web tarda en responder al principio, normalmente es porque MySQL aún está inicializando.

- Aplicación: [http://localhost:8082](http://localhost:8082)
- phpMyAdmin: [http://localhost:8083](http://localhost:8083)

## Documentación del proyecto

- Proyecto sin persistencia (sin BBDD):
  - [Guía Docker Base](./proyecto-sin-persistencia-sin-bbdd/docs/GUIA_DOCKER_BASE.md)
  - [Instalación de VS Code y extensiones](./proyecto-sin-persistencia-sin-bbdd/docs/INSTALACION_VSCODE_EXTENSIONES.md)
  - [Guía Docker para PHP](./proyecto-sin-persistencia-sin-bbdd/docs/GUIA_DOCKER_PHP.md)
- Proyecto con persistencia en MySQL:
  - [Guía Docker + MySQL + PDO](./proyecto-con-persistencia-en-mysql/docs/GUIA_DOCKER_PHP_MYSQL_PDO.md)

## Recursos recomendados

- Docker:
  - [Docker Docs](https://docs.docker.com/)
  - [Docker Compose Overview](https://docs.docker.com/compose/)
  - [Docker Hub PHP](https://hub.docker.com/_/php)
  - [Docker Hub MySQL](https://hub.docker.com/_/mysql)
- PHP y base de datos:
  - [Manual oficial de PHP](https://www.php.net/manual/es/)
  - [PHP PDO](https://www.php.net/manual/es/book.pdo.php)
  - [MySQL Documentation](https://dev.mysql.com/doc/)
  - [phpMyAdmin Docs](https://docs.phpmyadmin.net/)
- Editor y extensiones:
  - [Visual Studio Code](https://code.visualstudio.com/)
  - [Containers para VS Code (imprescindible)](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-containers)
  - [Docker Extension for VS Code](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker)
  - [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)

## Comandos útiles

```bash
# Ver contenedores del proyecto actual
docker compose ps

# Ver logs en tiempo real
docker compose logs -f

# Entrar al contenedor PHP
docker compose exec app bash

# Reconstruir imágenes
docker compose build --no-cache
```

Consejo: usa `docker compose ps` como primer diagnóstico rápido; te indica si un servicio está caído o reiniciando.

## Qué carpeta usar

- Empieza por `proyecto-sin-persistencia-sin-bbdd` si es tu primer contacto con Docker.
- Continúa con `proyecto-con-persistencia-en-mysql` para trabajar integración con base de datos.

## Parar servicios

Desde la carpeta de cada proyecto:

```bash
docker compose down
```
