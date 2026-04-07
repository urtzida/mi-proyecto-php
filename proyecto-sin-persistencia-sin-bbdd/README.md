# Proyecto sin persistencia (sin BBDD) · PHP sin base de datos

[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/)
[![Nivel](https://img.shields.io/badge/Nivel-Inicial-success)](../README.md)

Objetivo: levantar una aplicación PHP básica en Docker (sin base de datos).

En este proyecto no hay persistencia ni servicios extra: la meta es dominar el flujo base de Docker sin ruido.

## Índice

- [Inicio rápido](#inicio-rápido)
- [Qué vas a practicar](#qué-vas-a-practicar)
- [Comandos útiles](#comandos-útiles)
- [Siguiente paso](#siguiente-paso)

## Inicio rápido

```bash
cd proyecto-sin-persistencia-sin-bbdd
docker compose up -d --build
docker compose ps
```

Qué hace cada comando:

- `up -d --build`: construye la imagen y arranca en segundo plano.
- `ps`: confirma que el servicio está `Up` y en qué puerto publica.

Abrir: [http://localhost:8080](http://localhost:8080)

## Qué vas a practicar

- Arranque de un entorno PHP con Docker Compose.
- Edición de código con recarga en navegador.
- Flujo básico de levantar, probar y parar contenedores.

Edita `src/index.php`, guarda y recarga para ver cambios.

Este ciclo corto (editar -> guardar -> recargar) es el hábito principal que interesa automatizar en este proyecto.

## Comandos útiles

```bash
# Ver estado
docker compose ps

# Ver logs
docker compose logs -f

# Parar entorno
docker compose down
```

Si notas comportamiento raro, prueba `docker compose down` y luego `docker compose up -d --build` para reiniciar limpio.

## Siguiente paso

Cuando domines este proyecto, continúa en [Proyecto con persistencia en MySQL](../proyecto-con-persistencia-en-mysql/README.md) para integrar MySQL + PDO.
