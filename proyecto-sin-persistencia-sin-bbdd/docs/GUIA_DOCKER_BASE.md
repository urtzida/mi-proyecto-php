# Introducción a Docker para IMAW

[![Docker Desktop](https://img.shields.io/badge/Docker%20Desktop-Windows-2496ED?logo=docker&logoColor=white)](https://www.docker.com/products/docker-desktop/)
[![Compose](https://img.shields.io/badge/Compose-Workflow-1D63ED)](https://docs.docker.com/compose/)

Guía base para entender Docker en el proyecto y arrancar el entorno sin bloqueos.

No busca que memorices todo Docker: busca darte un mapa mínimo para saber qué tocar cuando algo falla.

Nivel: `1/2` (de menos a más). Después continúa con la guía de PHP.

## Índice

- [Preparación en Windows](#preparación-en-windows)
- [Mapa mental rápido](#mapa-mental-rápido)
- [Dockerfile vs docker-compose.yml](#dockerfile-vs-docker-composeyml)
- [Comandos base](#comandos-base)
- [Errores típicos](#errores-típicos)

## Preparación en Windows

1. Instala [Docker Desktop](https://www.docker.com/products/docker-desktop/).
2. Reinicia si el instalador lo pide.
3. Abre Docker Desktop y confirma estado `Running`.
4. Activa `Use the WSL 2 based engine` en `Settings > General`.

Sin WSL2, en Windows suele haber problemas de rendimiento y compatibilidad al montar archivos del proyecto.

Comprobación:

```bash
docker --version
docker compose version
```

Si ambos comandos responden con versión, Docker CLI y Compose están disponibles correctamente.

## Mapa mental rápido

| Concepto | Traducción sencilla |
|---|---|
| Imagen | Plantilla base (ejemplo `php:8.2-apache`). |
| Contenedor | Instancia en ejecución de una imagen. |
| Volumen | Datos persistentes fuera del contenedor. |
| Red Docker | Comunicación entre servicios por nombre (`app`, `db`). |

## Dockerfile vs docker-compose.yml

| Archivo | Para qué sirve |
|---|---|
| `Dockerfile` | Define cómo construir una imagen. |
| `docker-compose.yml` | Define qué servicios levantar y cómo se conectan. |

Regla rápida:

- Cambias runtime o paquetes: `Dockerfile`.
- Cambias puertos, variables o servicios: `docker-compose.yml`.

Esta separación te ayuda a decidir rápido si necesitas reconstruir imagen o solo reiniciar servicios.

## Comandos base

```bash
docker compose up -d --build
docker compose ps
docker compose down
```

Secuencia recomendada para empezar: `up` -> `ps` -> abrir navegador. Si algo no funciona, revisa logs antes de rehacer todo.

## Errores típicos

- Puerto ocupado: cambia el puerto publicado o cierra el proceso que lo usa.
- Docker no responde: espera a que Docker Desktop esté en `Running`.
- Cambiaste Dockerfile y no se aplica: ejecuta `docker compose up -d --build`.

## Recurso recomendado

Siguiente nivel: [Guía Docker para PHP](./GUIA_DOCKER_PHP.md).
