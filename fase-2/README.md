# Fase 2 - PHP + MySQL (PDO)

**Autores: Ernesto eta Urtzi**

Objetivo: conectar PHP con MySQL usando PDO.

## Antecedentes rapidos de Docker

Docker encapsula cada servicio en contenedores para que la app funcione igual en cualquier equipo.

En implantacion web esto permite:

- Separar servicios (`app`, `db`, `phpmyadmin`) de forma ordenada.
- Reproducir el entorno sin pasos manuales complejos.
- Compartir configuracion estable mediante `docker-compose.yml`.

Lo que mola en Fase 2:

- Simulas una arquitectura real web + base de datos.
- Puedes levantar y parar todo el stack en segundos.
- Practicas un flujo parecido al de proyectos profesionales.

## 1. Entrar en carpeta

```bash
cd mi-proyecto-php\fase-2
```

## 2. Arrancar

```bash
docker compose up -d --build
docker compose ps
```

## 3. Probar

- App: http://localhost:8082
- phpMyAdmin: http://localhost:8083

## 4. Datos de BD

- Host (desde PHP): `db`
- Puerto interno: `3306`
- BD: `imaw`
- Usuario: `imaw`
- Password: `imaw`
- Root: `root` / `root`

## 5. Guia educativa de cambios

- [Guia educativa Fase 2 (Docker + MySQL + PDO)](docs/GUIA_FASE_2_DOCKER_PDO.md)

## 6. Parar

```bash
docker compose down
```
