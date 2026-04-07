# Fase 1 · PHP sin base de datos

[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?logo=docker&logoColor=white)](https://docs.docker.com/compose/)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/manual/es/)
[![Nivel](https://img.shields.io/badge/Nivel-Inicial-success)](../README.md)

Objetivo: levantar una aplicacion PHP basica en Docker (sin base de datos).

## Indice

- [Inicio rapido](#inicio-rapido)
- [Que vas a practicar](#que-vas-a-practicar)
- [Comandos utiles](#comandos-utiles)
- [Siguiente paso](#siguiente-paso)

## Inicio rapido

```bash
cd fase-1
docker compose up -d --build
docker compose ps
```

Abrir: [http://localhost:8080](http://localhost:8080)

## Que vas a practicar

- Arranque de un entorno PHP con Docker Compose.
- Edicion de codigo con recarga en navegador.
- Flujo basico de levantar, probar y parar contenedores.

Edita `src/index.php`, guarda y recarga para ver cambios.

## Comandos utiles

```bash
# Ver estado
docker compose ps

# Ver logs
docker compose logs -f

# Parar entorno
docker compose down
```

## Siguiente paso

Cuando domines esta fase, continua en [Fase 2](../fase-2/README.md) para integrar MySQL + PDO.
