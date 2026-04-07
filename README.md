# IMAW - Proyecto PHP con Docker

**Autor: Urtzi**

Entorno de desarrollo y pruebas para IMAW usando Docker Desktop en Windows.

## Requisitos

- Windows 10/11
- Docker Desktop instalado y en estado "Running"
- WSL2 activado en Docker Desktop (`Settings > General > Use the WSL 2 based engine`)

Comprobación rápida:

```bash
docker --version
docker compose version
```

## Arranque rápido

Desde la raíz del proyecto:

```bash
docker compose up -d --build
docker compose ps
```

URLs:

- App PHP: http://localhost:8080
- phpMyAdmin: http://localhost:8081

Parada:

```bash
docker compose down
```

## Estructura del proyecto

```text
mi-proyecto-php/
├─ README.md
├─ docker-compose.yml
├─ docker/
│  └─ php/
│     └─ Dockerfile
├─ src/
└─ docs/
   ├─ GUIA_DOCKER_BASE.md
   ├─ GUIA_DOCKER_PHP.md
   └─ INSTALACION_VSCODE_EXTENSIONES.md
```

## Documentación

- [Introducción a Docker (base)](docs/GUIA_DOCKER_BASE.md)
- [Docker para desarrollo y pruebas en PHP](docs/GUIA_DOCKER_PHP.md)
- [Instalación VS Code y extensiones](docs/INSTALACION_VSCODE_EXTENSIONES.md)