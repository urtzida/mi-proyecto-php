# Fase 1 - PHP sin base de datos

**Autores: Ernesto eta Urtzi**

Objetivo: levantar un hola mundo en PHP con Docker.

## Antecedentes rapidos de Docker

Docker permite ejecutar aplicaciones dentro de contenedores, que son entornos aislados y reproducibles.

Para desarrollo e implantacion web aporta:

- Mismo entorno para todo el grupo.
- Menos problemas de instalaciones locales.
- Configuracion versionada en el repo.
- Transicion mas limpia de desarrollo a servidor.

Lo que mola en esta fase:

- Levantas PHP con un comando.
- Puedes editar codigo y ver cambios al instante.
- No dependes de tener todo instalado en local.

## 1. Obtener proyecto

```bash
git clone <URL_DEL_REPOSITORIO>
cd mi-proyecto-php\fase-1
```

## 2. Arrancar

```bash
docker compose up -d --build
docker compose ps
```

## 3. Probar

Abrir: http://localhost:8080

## 4. Editar hola mundo

Edita `src/index.php`, guarda y recarga navegador.

## 5. Parar

```bash
docker compose down
```
