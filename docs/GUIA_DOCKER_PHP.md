# Docker para desarrollo y pruebas en PHP (v1)

**Autor: Urtzi**

Este proyecto ya viene preparado para trabajar con Docker en lugar de XAMPP.

## 1. Requisitos previos (Windows)

- Windows 10/11 con virtualización activada en BIOS/UEFI.
- Docker Desktop para Windows instalado y arrancado.
- Backend WSL2 activado en Docker Desktop (`Settings > General > Use the WSL 2 based engine`).
- Git (opcional, pero recomendado).

Comprobación rápida:

```bash
docker --version
docker compose version
```

## 2. Servicios incluidos

- `app`: PHP 8.2 + Apache.
- `db`: MariaDB 11.
- `phpmyadmin`: gestión visual de la base de datos.
- `composer`: utilidad para ejecutar Composer sin instalarlo en local.

## 3. Arranque inicial

Desde la raíz del proyecto:

```bash
docker compose up -d --build
```

Comprobar estado:

```bash
docker compose ps
```

## 4. URLs de trabajo

- App PHP: http://localhost:8080
- phpMyAdmin: http://localhost:8081

## 5. Datos de conexión a base de datos

- Host: `db`
- Puerto: `3306`
- Base de datos: `imaw`
- Usuario: `imaw`
- Contraseña: `imaw`
- Usuario root: `root`
- Contraseña root: `root`

## 6. Diferencias entre Dockerfile y Docker Compose

- `Dockerfile`: define **cómo se construye una imagen**.
- `docker-compose.yml`: define **cómo se ejecutan y coordinan uno o varios contenedores**.

Ejemplo en este proyecto:

- En `docker/php/Dockerfile` se instala PHP con extensiones como `mysqli`, `pdo_mysql` y se activa `rewrite`.
- En `docker-compose.yml` se conectan los servicios (`app`, `db`, `phpmyadmin`), se abren puertos y se montan volúmenes.

Regla rápida para clase:

- Si cambias paquetes, extensiones o configuración base de la imagen -> `Dockerfile`.
- Si cambias puertos, variables, volúmenes o número de servicios -> `docker-compose.yml`.

## 7. Comandos útiles

Instalar dependencias con Composer:

```bash
docker compose run --rm composer install
```

Crear un proyecto Composer (si aún no hay `composer.json`):

```bash
docker compose run --rm composer init
```

Ejecutar pruebas (si usas PHPUnit):

```bash
docker compose exec app php vendor/bin/phpunit
```

Entrar al contenedor PHP:

```bash
docker compose exec app bash
```

Parar servicios:

```bash
docker compose down
```

Parar y borrar volúmenes (reinicio completo de BD):

```bash
docker compose down -v
```

## 8. Estructura recomendada mínima

```text
mi-proyecto-php/
├─ docker-compose.yml
├─ docker/
│  └─ php/
│     └─ Dockerfile
└─ src/
   └─ index.php
```

## 9. Flujo de clase sugerido

1. Levantar contenedores con `docker compose up -d --build`.
2. Programar en `src/` desde VS Code.
3. Probar en navegador (`localhost:8080`).
4. Ejecutar Composer y pruebas desde Docker.

## 10. Notas para siguientes versiones

- Añadir `phpunit.xml` y una carpeta `tests/` para estandarizar pruebas.
- Añadir `.env` y `env.example` para credenciales.
- Añadir perfil opcional con Xdebug para depuración.