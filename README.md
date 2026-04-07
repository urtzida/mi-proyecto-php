# IMAW � Docker por Fases para PHP

[![Docker](https://img.shields.io/badge/Docker-Containerized-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/docs.php)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/)
[![Status](https://img.shields.io/badge/Curso-Activo-success)](#inicio-rapido)

Proyecto docente organizado en dos fases progresivas para aprender despliegue con Docker en aplicaciones PHP.

## Indice

- [Autores](#autores)
- [Vista general](#vista-general)
- [Ruta recomendada](#ruta-recomendada)
- [Inicio rapido](#inicio-rapido)
- [Documentacion del proyecto](#documentacion-del-proyecto)
- [Recursos recomendados](#recursos-recomendados)
- [Comandos utiles](#comandos-utiles)
- [Que carpeta usar](#que-carpeta-usar)
- [Parar servicios](#parar-servicios)

## Autores

**Ernesto eta Urtzi**

## Vista general

Este repositorio separa el aprendizaje en dos bloques independientes:

| Fase | Objetivo | Stack |
|---|---|---|
| `fase-1` | Primer despliegue de una app PHP | PHP (sin base de datos) |
| `fase-2` | Integrar persistencia en entorno Docker | PHP + MySQL (PDO) |

## Ruta recomendada

Antes de levantar contenedores, sigue este orden:

1. Revisa la documentacion de `fase-1/docs/`.
2. Verifica que Docker y VS Code esten listos.
3. Arranca la fase correspondiente segun tu nivel.

## Inicio rapido

### Fase 1 � PHP

```bash
cd fase-1
docker compose up -d --build
```

- Aplicacion: [http://localhost:8080](http://localhost:8080)

### Fase 2 � PHP + MySQL

```bash
cd fase-2
docker compose up -d --build
```

- Aplicacion: [http://localhost:8082](http://localhost:8082)
- phpMyAdmin: [http://localhost:8083](http://localhost:8083)

## Documentacion del proyecto

- Fase 1:
  - [Guia Docker Base](./fase-1/docs/GUIA_DOCKER_BASE.md)
  - [Instalacion VS Code y extensiones](./fase-1/docs/INSTALACION_VSCODE_EXTENSIONES.md)
  - [Guia Docker para PHP](./fase-1/docs/GUIA_DOCKER_PHP.md)
- Fase 2:
  - [Documentacion de fase 2](./fase-2/docs/)

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
## Comandos utiles

```bash
# Ver contenedores de la fase actual
docker compose ps

# Ver logs en tiempo real
docker compose logs -f

# Entrar al contenedor PHP
docker compose exec php bash

# Reconstruir imagenes
docker compose build --no-cache
```

## Que carpeta usar

- Empieza por `fase-1` si es tu primer contacto con Docker.
- Continua con `fase-2` para trabajar integracion con base de datos.

## Parar servicios

Desde la carpeta de cada fase:

```bash
docker compose down
```
