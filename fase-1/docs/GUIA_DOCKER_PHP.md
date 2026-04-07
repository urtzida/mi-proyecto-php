# Docker para desarrollo y pruebas en PHP (v2)

**Autores: Ernesto eta Urtzi**

> [!IMPORTANT]
> Fase 1: en esta guia solo trabajamos PHP. La base de datos queda para Fase 2.

## 0. Obtener el proyecto

Tienes dos opciones:

### Opcion A: clonar con Git (recomendada)

```bash
git clone <URL_DEL_REPOSITORIO>
cd mi-proyecto-php
```

### Opcion B: descargar ZIP

1. Descarga el repositorio como `.zip` desde la plataforma.
2. Descomprime el contenido.
3. Abre una terminal dentro de la carpeta `mi-proyecto-php`.

> [!TIP]
> Si vas a entregar practicas o hacer cambios frecuentes, usa `git clone`.

## 1. Requisitos (Windows)

- Windows 10/11 con virtualizacion activa.
- Docker Desktop instalado y en `Running`.
- WSL2 activado (`Settings > General > Use the WSL 2 based engine`).
- Git (recomendado).

Verificacion:

```bash
docker --version
docker compose version
```

## 2. Que servicios levanta este proyecto (Fase 1)

| Servicio | Funcion | URL / acceso |
|---|---|---|
| `app` | PHP 8.2 + Apache | http://localhost:8080 |
| `composer` | Comandos Composer puntuales | `docker compose run --rm composer ...` |

### Por que hemos anadido `composer` en `docker-compose.yml`

- Evita instalar Composer en cada ordenador.
- Todos usamos la misma version (`composer:2`) y el mismo comportamiento.
- Permite ejecutar `composer install`, `require` o `update` dentro de Docker.
- Reduce el clasico "en mi equipo funciona distinto".

En esta fase, `composer` es un servicio de soporte, no un servicio web permanente. Por eso se ejecuta bajo demanda con `docker compose run --rm composer ...`.

## 3. Arranque

```bash
docker compose up -d --build
docker compose ps
```

> [!TIP]
> Si `ps` muestra `app` como `Up`, el entorno esta listo para programar.

## 4. Dockerfile vs docker-compose.yml

| Si quieres... | Toca... |
|---|---|
| Instalar extensiones PHP o paquetes del sistema | `docker/php/Dockerfile` |
| Cambiar puertos, volumenes o servicios | `docker-compose.yml` |

Ejemplo real de este repo:

- `Dockerfile`: anade `pdo_mysql`, `mysqli`, `zip` y activa `rewrite`.
- `docker-compose.yml`: levanta `app`, define puerto/volumen y ofrece un servicio `composer` para gestionar dependencias.

### Sintaxis esencial de `docker-compose.yml` (explicada rapido)

```yaml
services:
  app:
    build:
      context: .
      dockerfile: docker/php/Dockerfile
    ports:
      - "8080:80"
    volumes:
      - ./src:/var/www/html

  composer:
    image: composer:2
    working_dir: /app
    volumes:
      - ./:/app
    profiles:
      - tools
```

Que significa cada bloque:

- `services`: lista de contenedores que Compose sabe crear.
- `app` y `composer`: nombre logico de cada servicio (se usa en comandos como `docker compose exec app ...`).
- `build`: en vez de bajar una imagen tal cual, construimos una imagen propia con nuestro `Dockerfile`.
- `image`: usa una imagen ya publicada (en este caso, oficial de Composer).
- `ports`: `HOST:CONTENEDOR` (ejemplo `8080:80`).
- `volumes`: carpeta local montada dentro del contenedor.
- `working_dir`: directorio por defecto al ejecutar comandos en ese servicio.
- `profiles`: permite marcar servicios opcionales para no levantarlos siempre.

## 5. Comandos de trabajo frecuentes

```bash
# Dependencias PHP
docker compose run --rm composer install

# Anadir una libreria nueva
docker compose run --rm composer require monolog/monolog

# Entrar al contenedor PHP
docker compose exec app bash

# Ejecutar pruebas (si hay PHPUnit)
docker compose exec app php vendor/bin/phpunit

# Parar entorno
docker compose down
```

## 6. Rutina sugerida para cada practica

1. Levantar entorno con `up -d --build`.
2. Programar en `src/`.
3. Probar en `http://localhost:8080`.
4. Ejecutar pruebas si existen.

## 7. Control de incidencias rapido

> [!WARNING]
> Si no abre `localhost:8080`, revisa `docker compose ps` y conflictos de puertos.

> [!TIP]
> Tras cambios en `Dockerfile`, reconstruye con `docker compose up -d --build`.

## 8. Objetivo de aprendizaje

Al terminar esta fase, el alumno deberia poder:

- arrancar el entorno PHP,
- desarrollar y probar un "hola mundo",
- y ejecutar comandos de trabajo desde Docker.
