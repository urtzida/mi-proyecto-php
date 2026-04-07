# IMAW - Docker por fases

**Autores: Ernesto eta Urtzi**

Este repo esta dividido en 2 partes independientes para el alumnado:

- `fase-1`: PHP solo (hola mundo), sin base de datos.
- `fase-2`: PHP + MySQL con PDO.

## Ruta recomendada (antes de levantar contenedores)

1. Lee e instala siguiendo las guias de `fase-1/docs/`:
   - `GUIA_DOCKER_BASE.md`
   - `INSTALACION_VSCODE_EXTENSIONES.md`
   - `GUIA_DOCKER_PHP.md`
2. Cuando tengas Docker listo y VS Code preparado, arranca la fase que toque.

## Antecedentes: que es Docker y para que sirve

Docker es una tecnologia de contenedores: empaqueta una aplicacion con todo lo necesario para ejecutarse (runtime, librerias y configuracion) de forma portable.

Para implantacion de aplicaciones web sirve para:

- Ejecutar la app igual en todos los equipos (aula, casa y servidor).
- Reducir errores de entorno ("en mi PC funciona").
- Definir infraestructura como codigo (`Dockerfile` y `docker-compose.yml`).
- Montar servicios reales de backend (web, base de datos, herramientas) en minutos.

Lo que mola en practicas de web:

- Arranque rapido de entornos con un solo comando.
- Flujo de equipo mas ordenado y repetible.
- Paso a produccion mas natural porque el entorno se parece al real.

## Que carpeta usar

- Empieza por `fase-1` si es la primera vez con Docker.
- Pasa a `fase-2` cuando toque integracion con base de datos.

## Arranque (despues de seguir las guias)

### Fase 1

```bash
cd fase-1
docker compose up -d --build
```

App: http://localhost:8080

### Fase 2

```bash
cd fase-2
docker compose up -d --build
```

App: http://localhost:8082
phpMyAdmin: http://localhost:8083

## Notas

- Cada fase tiene su propio `docker-compose.yml`.
- Cada fase incluye su documentacion en `docs/`.
- Puedes parar cada fase desde su carpeta:

```bash
docker compose down
```
