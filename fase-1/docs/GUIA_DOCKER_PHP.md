# Docker para desarrollo y pruebas en PHP

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/)
[![Docker Compose](https://img.shields.io/badge/Docker%20Compose-Ready-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)

Guia practica de Fase 1 para trabajar PHP dentro de Docker.

Nivel: `2/2` (de menos a mas), despues de la guia base.

## Indice

- [Paso previo](#paso-previo)
- [Requisitos](#requisitos)
- [Servicios de la fase](#servicios-de-la-fase)
- [Arranque](#arranque)
- [Comandos de trabajo](#comandos-de-trabajo)
- [Troubleshooting rapido](#troubleshooting-rapido)

## Paso previo

Primero revisa [Guia Docker base](./GUIA_DOCKER_BASE.md).

## Requisitos

- Windows 10/11.
- Docker Desktop en `Running`.
- WSL2 activado.
- Git recomendado.

Verificacion:

```bash
docker --version
docker compose version
```

## Servicios de la fase

| Servicio | Funcion | Acceso |
|---|---|---|
| `app` | PHP + Apache | [http://localhost:8080](http://localhost:8080) |
| `composer` | Comandos puntuales de dependencias | `docker compose run --rm composer ...` |

## Arranque

```bash
docker compose up -d --build
docker compose ps
```

## Comandos de trabajo

```bash
# Instalar dependencias
docker compose run --rm composer install

# Anadir libreria
docker compose run --rm composer require monolog/monolog

# Entrar al contenedor app
docker compose exec app bash

# Parar entorno
docker compose down
```

## Troubleshooting rapido

- Si no abre `localhost:8080`, revisa `docker compose ps`.
- Si cambias `Dockerfile`, reconstruye con `--build`.
- Si falla Composer, comprueba que existe `composer.json` en el proyecto.

## Siguiente paso

Cuando esta guia te resulte comoda, continua con [Fase 2](../../fase-2/README.md).
