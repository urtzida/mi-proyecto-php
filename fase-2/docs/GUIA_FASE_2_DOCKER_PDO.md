# Guia Educativa Fase 2: Docker + MySQL + PDO

**Autores: Ernesto eta Urtzi**

## Objetivo de esta fase

En Fase 1 trabajamos solo con PHP.
En Fase 2 añadimos base de datos para aprender como una app real se conecta a MySQL usando PDO.

## Antecedentes: Docker aplicado a apps web con datos

Docker permite ejecutar cada parte de una aplicacion web en contenedores aislados: app, base de datos y herramientas de apoyo.

Para implantacion web esto es clave porque:

- Hace reproducible el entorno completo del proyecto.
- Permite versionar tambien la infraestructura (Dockerfile y docker-compose.yml).
- Facilita mover la app entre equipos y servidores con menos sorpresas.
- Mejora colaboracion porque todos trabajan sobre el mismo stack.

Lo que mola en esta fase:

- Ves arquitectura real multicontenedor sin complicarte con instalaciones manuales.
- Puedes probar cambios en app y BD de forma inmediata.
- Aprendes un flujo profesional reutilizable en proyectos reales.

## Que cambia respecto a Fase 1

| Tema | Fase 1 | Fase 2 | Para que sirve |
|---|---|---|---|
| Servicios Docker | `app`, `composer` | `app`, `db`, `phpmyadmin`, `composer` | Simular arquitectura real de aplicacion + BD |
| Puerto web | `8080` | `8082` | Evitar conflictos si ambas fases estan levantadas |
| Base de datos | No | MySQL 8.4 | Persistencia de datos |
| Admin BD | No | phpMyAdmin | Ver tablas y datos de forma visual |
| Codigo PHP | Hola mundo simple | Conexion PDO + consulta SQL | Entender backend con datos |

## Cambios en docker-compose.yml

Antes de entrar por servicio, recuerda la base de sintaxis:

- `services`: define los contenedores de la aplicacion.
- cada clave (`app`, `db`, `phpmyadmin`, `composer`) es un servicio.
- dentro de cada servicio usamos claves como `image`, `build`, `ports`, `volumes`, `environment`, `depends_on`.
- `volumes` fuera de `services` define volumenes nombrados persistentes (ejemplo `db_data`).

Mini ejemplo del patron general:

```yaml
services:
  nombre_servicio:
    image: imagen:version
    ports:
      - "HOST:CONTENEDOR"
    volumes:
      - origen:destino
```

### 1. Nuevo servicio `db`

- **Que hacemos**: añadimos un contenedor MySQL.
- **Por que**: PHP necesita un servidor de BD para guardar y leer informacion.
- **Para que**: practicar conexiones reales con credenciales, tablas y consultas.

Bloque clave:

```yaml
db:
  image: mysql:8.4
  environment:
    MYSQL_DATABASE: imaw
    MYSQL_USER: imaw
    MYSQL_PASSWORD: imaw
```

### 2. Nuevo servicio `phpmyadmin`

- **Que hacemos**: añadimos una interfaz web de administracion.
- **Por que**: puedes ver la BD sin usar consola SQL al principio.
- **Para que**: comprobar visualmente que la tabla y los datos existen.

### 3. `depends_on` en `app`

- **Que hacemos**: `app` depende de `db`.
- **Por que**: la aplicacion debe arrancar cuando la BD ya esta disponible.
- **Para que**: reducir errores de conexion al iniciar.

### 4. Volumen `db_data`

- **Que hacemos**: montamos un volumen para MySQL.
- **Por que**: si reinicias contenedores, los datos no se pierden.
- **Para que**: trabajar practicas con persistencia real.

### 5. Script de inicializacion SQL

- **Que hacemos**: montamos `docker/mysql/init.sql` en `docker-entrypoint-initdb.d`.
- **Por que**: crear tabla y dato inicial automaticamente.
- **Para que**: ves resultados desde el primer arranque.

### 6. Servicio `composer` en Compose

- **Que hacemos**: mantenemos un servicio `composer` con imagen `composer:2`.
- **Por que**: no instalar Composer en local y usar misma version en todo el grupo.
- **Para que**: gestionar dependencias de PHP de forma repetible dentro del entorno Docker.

Uso habitual:

```bash
docker compose run --rm composer install
docker compose run --rm composer require vendor/paquete
```

Nota de sintaxis usada:

- `profiles: [tools]` lo marca como servicio auxiliar; no es necesario levantarlo siempre con `up`.
- `working_dir: /app` define la carpeta de ejecucion para los comandos Composer.
- `volumes: - ./:/app` monta el proyecto para que Composer vea `composer.json` y escriba `vendor/`.

## Cambios en Dockerfile (PHP)

En Fase 2 se mantiene la instalacion de extensiones necesarias para trabajar con BD:

- `pdo`
- `pdo_mysql`
- `mysqli`

**Por que**:

- `pdo_mysql` es clave para la conexion PDO a MySQL.

## Cambios en el codigo PHP

Archivo: `src/index.php`

- Se crea conexion PDO a host `db`.
- Se ejecuta una consulta `SELECT`.
- Se muestra mensaje de BD en navegador.
- Se captura error de conexion con `try/catch`.

**Resultado esperado**:

- ves diferencia entre app sin datos y app conectada a una BD real.

## Flujo recomendado

1. Levantar Fase 2 con `docker compose up -d --build`.
2. Abrir app en `http://localhost:8082`.
3. Abrir phpMyAdmin en `http://localhost:8083`.
4. Ver tabla `mensajes` y relacionarla con lo que muestra `index.php`.
5. Cambiar un dato en BD y recargar la app.

## Errores frecuentes

- **Error de conexion PDO**: normalmente la BD aun no esta lista o credenciales incorrectas.
- **No aparece tabla**: revisar que `init.sql` esta montado y reiniciar entorno.
- **Puerto ocupado**: cambiar puerto publicado (`8082`, `8083`, `3307`).
- **Composer no encuentra `composer.json`**: revisar `working_dir` y el volumen `./:/app` del servicio `composer`.

## Cierre

Fase 2 introduce el primer salto importante en backend:

- de script PHP aislado
- a aplicacion con servicios coordinados (web + BD + admin)

Con esto, la clase ya puede empezar CRUD en siguientes practicas.

