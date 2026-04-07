# Introduccion a Docker para IMAW

[![Docker Desktop](https://img.shields.io/badge/Docker%20Desktop-Windows-2496ED?logo=docker&logoColor=white)](https://www.docker.com/products/docker-desktop/)
[![Compose](https://img.shields.io/badge/Compose-Workflow-1D63ED)](https://docs.docker.com/compose/)

Guia base para entender Docker en el proyecto y arrancar el entorno sin bloqueos.

Nivel: `1/2` (de menos a mas). Despues continua con la guia de PHP.

## Indice

- [Preparacion en Windows](#preparacion-en-windows)
- [Mapa mental rapido](#mapa-mental-rapido)
- [Dockerfile vs docker-composeyml](#dockerfile-vs-docker-composeyml)
- [Comandos base](#comandos-base)
- [Errores tipicos](#errores-tipicos)

## Preparacion en Windows

1. Instala [Docker Desktop](https://www.docker.com/products/docker-desktop/).
2. Reinicia si el instalador lo pide.
3. Abre Docker Desktop y confirma estado `Running`.
4. Activa `Use the WSL 2 based engine` en `Settings > General`.

Comprobacion:

```bash
docker --version
docker compose version
```

## Mapa mental rapido

| Concepto | Traduccion sencilla |
|---|---|
| Imagen | Plantilla base (ejemplo `php:8.2-apache`). |
| Contenedor | Instancia en ejecucion de una imagen. |
| Volumen | Datos persistentes fuera del contenedor. |
| Red Docker | Comunicacion entre servicios por nombre (`app`, `db`). |

## Dockerfile vs docker-compose.yml

| Archivo | Para que sirve |
|---|---|
| `Dockerfile` | Define como construir una imagen. |
| `docker-compose.yml` | Define que servicios levantar y como se conectan. |

Regla rapida:

- Cambias runtime o paquetes: `Dockerfile`.
- Cambias puertos, variables o servicios: `docker-compose.yml`.

## Comandos base

```bash
docker compose up -d --build
docker compose ps
docker compose down
```

## Errores tipicos

- Puerto ocupado: cambia el puerto publicado o cierra el proceso que lo usa.
- Docker no responde: espera a que Docker Desktop este en `Running`.
- Cambiaste Dockerfile y no se aplica: ejecuta `docker compose up -d --build`.

## Recurso recomendado

Siguiente nivel: [Guia Docker para PHP](./GUIA_DOCKER_PHP.md).
