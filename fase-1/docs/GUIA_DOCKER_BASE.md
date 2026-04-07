# Introduccion a Docker para IMAW (v2)

**Autores: Ernesto eta Urtzi**

> [!IMPORTANT]
> Objetivo de esta guia: que en la primera sesion puedas arrancar el proyecto, entender que estas ejecutando y no depender de "me funciona en mi PC".

## 0. Preparacion en Windows

1. Instala Docker Desktop: https://www.docker.com/products/docker-desktop/
2. Reinicia el equipo si el instalador lo pide.
3. Abre Docker Desktop y confirma estado `Running`.
4. Activa WSL2 en `Settings > General > Use the WSL 2 based engine`.

Comprobacion en PowerShell:

```bash
docker --version
docker compose version
```

## 1. Mapa mental rapido

| Concepto | Traduccion sencilla |
|---|---|
| Imagen | La "plantilla" preparada (ejemplo: `php:8.2-apache`). |
| Contenedor | Una imagen en ejecucion. |
| Volumen | Disco persistente para datos. |
| Red Docker | Permite que los contenedores hablen entre si por nombre (`db`, `app`, etc.). |

## 1.1 Antecedentes: que es Docker y para que sirve en web

Docker es una plataforma de contenedores. Un contenedor empaqueta aplicacion + dependencias para ejecutarla igual en cualquier entorno.

En implantacion de aplicaciones web se usa para:

- Estandarizar el runtime (misma version de PHP, Apache, MySQL, etc.).
- Automatizar arranque de servicios con `docker compose`.
- Reducir errores por diferencias entre equipos.
- Acercar el entorno de clase al entorno real de produccion.

Lo que mola:

- Onboarding rapido de nuevos compañeros.
- Cambios de equipo sin rehacer instalaciones.
- Flujo repetible para desarrollo, pruebas y despliegue.

## 2. Por que lo usamos

- Mismo entorno para todo el grupo.
- Menos tiempo perdido en instalaciones locales.
- Configuracion versionada en el repositorio.
- Flujo mas parecido al trabajo real en equipo.

## 3. Flujo de trabajo del dia a dia

```mermaid
flowchart LR
A[Levantar entorno] --> B[Programar en src]
B --> C[Probar en navegador]
C --> D[Parar o seguir]
```

Comandos base:

```bash
docker compose up -d --build
docker compose ps
docker compose down
```

## 4. Dockerfile vs docker-compose.yml

| Archivo | Responde a | Ejemplo en este proyecto |
|---|---|---|
| `Dockerfile` | Como construyo mi imagen | Instalar extensiones `pdo_mysql`, `mysqli`, `zip`, activar `rewrite`. |
| `docker-compose.yml` | Que servicios levanto y como se conectan | Arrancar servicios, puertos, volumenes y dependencias. |

Regla practica:

- Cambias paquetes o base del runtime -> `Dockerfile`
- Cambias puertos, variables o servicios -> `docker-compose.yml`

## 4.1 Sintaxis minima de docker-compose.yml

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

Lectura rapida:

- `services`: conjunto de contenedores del proyecto.
- `app`, `composer`: nombre logico de cada servicio.
- `build`: construye imagen propia con nuestro Dockerfile.
- `image`: usa imagen oficial publicada.
- `ports`: mapeo `HOST:CONTENEDOR`.
- `volumes`: mapeo carpeta local a carpeta en contenedor.
- `working_dir`: carpeta de trabajo por defecto.
- `profiles`: servicios opcionales que se ejecutan bajo demanda.

## 4.2 Por que anadimos Composer en Compose

- Evita instalar Composer en cada equipo.
- Garantiza misma version de Composer para todo el grupo.
- Facilita comandos como `install`, `require` y `update` dentro de Docker.
- Reduce diferencias entre ordenadores.

Uso tipico:

```bash
docker compose run --rm composer install
```

## 5. Checklist de arranque (primera sesion)

- [ ] Docker Desktop en `Running`.
- [ ] `docker compose version` funciona.
- [ ] El proyecto arranca con `docker compose up -d --build`.
- [ ] `http://localhost:8080` carga.

## 6. Errores tipicos y solucion rapida

> [!WARNING]
> Error: puerto en uso (`8080` o `3306`).
> Solucion: cerrar el servicio que lo usa o cambiar el puerto en `docker-compose.yml`.

> [!WARNING]
> Error: Docker no responde.
> Solucion: abrir Docker Desktop y esperar estado `Running`.

> [!WARNING]
> Error tras cambiar `Dockerfile` y no se aplica.
> Solucion: reconstruir con `docker compose up -d --build`.

> [!TIP]
> Dentro de Docker, la base de datos se llama `db` (no `localhost`) para la app PHP.

## 7. Mini reto de 10 minutos

1. Levanta el entorno.
2. Edita `src/index.php` y anade un texto nuevo.
3. Recarga el navegador y verifica el cambio.
4. Para el entorno con `docker compose down`.
