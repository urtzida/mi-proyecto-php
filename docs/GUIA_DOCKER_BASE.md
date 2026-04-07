# Introducción a Docker para IMAW (v1)

**Autor: Urtzi**

Esta guía está pensada para alumnado que usa Docker por primera vez en Windows.

## 0. Preparación en Windows (obligatorio)

1. Instalar Docker Desktop para Windows: https://www.docker.com/products/docker-desktop/
2. Reiniciar el equipo si el instalador lo pide.
3. Abrir Docker Desktop y comprobar que está en estado "Running".
4. Activar WSL2 en Docker Desktop (`Settings > General > Use the WSL 2 based engine`).

Comprobación en PowerShell:

```bash
docker --version
docker compose version
```

## 1. ¿Qué es Docker?

Docker permite empaquetar una aplicación y su entorno (runtime, librerías y configuración) en contenedores.

Idea clave:

- En lugar de instalar todo en tu Windows, lo ejecutas en contenedores aislados.

## 2. Conceptos básicos

- **Imagen**: plantilla inmutable con todo preparado (ejemplo: `php:8.2-apache`).
- **Contenedor**: instancia en ejecución de una imagen.
- **Volumen**: almacenamiento persistente (por ejemplo, datos de base de datos).
- **Red de Docker**: comunicación interna entre contenedores por nombre de servicio.

## 3. ¿Por qué usar Docker en clase?

- Mismo entorno para todo el grupo.
- Menos problemas de instalación.
- Configuración versionada en el repositorio.
- Preparación más cercana a entornos profesionales.

## 4. Flujo mental sencillo

1. Construir imagen (si hace falta): `docker compose build`
2. Levantar servicios: `docker compose up -d`
3. Trabajar código en `src/`
4. Parar servicios: `docker compose down`

## 5. Dockerfile vs Docker Compose

- `Dockerfile` responde a: **¿Cómo construyo mi imagen?**
- `docker-compose.yml` responde a: **¿Qué servicios necesito y cómo se conectan?**

Ejemplo rápido:

- `Dockerfile`: instala extensiones de PHP.
- `docker-compose.yml`: arranca `app` + `db` + `phpmyadmin`, mapea puertos y monta carpetas.

## 6. Comandos mínimos para empezar

```bash
docker compose up -d --build
docker compose ps
docker compose down
```

## 7. Buenas prácticas iniciales

- No guardar contraseñas reales en el repositorio.
- Usar variables de entorno para credenciales.
- Mantener `docker-compose.yml` bien comentado.
- Documentar pasos en archivos `.md` para que cualquiera pueda arrancar rápido.

## 8. Errores típicos de primer día

- Docker Desktop apagado.
- Puerto ocupado (`8080` o `3306`).
- Cambios de `Dockerfile` sin reconstruir (`--build`).
- Confusión entre host local y host interno (`db` dentro de Docker).