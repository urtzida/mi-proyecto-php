# Instalación de Visual Studio Code y extensiones (v2)

**Autores: Ernesto eta Urtzi**

> [!IMPORTANT]
> Primero Docker Desktop, después VS Code. Si Docker no está bien instalado, el resto no compensa.

## 0. Previo obligatorio: Docker Desktop (Windows)

1. Descargar: https://www.docker.com/products/docker-desktop/
2. Instalar con opciones por defecto.
3. Abrir Docker Desktop y confirmar estado `Running`.
4. Activar `Use the WSL 2 based engine` en `Settings > General`.

Comprobación en PowerShell:

```bash
docker --version
docker compose version
```

## 1. Instalar VS Code

1. Web oficial: https://code.visualstudio.com/
2. Descargar versión Windows.
3. Instalar con opciones por defecto.

## 2. Abrir el proyecto correcto

1. `Archivo > Abrir carpeta...`
2. Seleccionar `mi-proyecto-php`.
3. Verificar que ves `docker-compose.yml`, `src/` y `docs/`.

## 3. Extensiones imprescindibles

| Extensión | Id | Para qué ayuda |
|---|---|---|
| Dev Containers | `ms-vscode-remote.remote-containers` | Abrir y trabajar dentro del contenedor con entorno homogéneo para todo el grupo. |
| PHP Intelephense | `bmewburn.vscode-intelephense-client` | Autocompletado, análisis y navegación PHP. |
| Docker | `ms-azuretools.vscode-docker` | Gestión visual de contenedores y Compose. |

## 4. Extensiones recomendadas

| Extensión | Id | Para qué ayuda |
|---|---|---|
| PHP Debug | `xdebug.php-debug` | Depuración con Xdebug (cuando se active en v2). |
| DotENV | `mikestead.dotenv` | Mejor edición de archivos `.env`. |
| EditorConfig | `EditorConfig.EditorConfig` | Estilo consistente entre equipos. |

Opcionales:

- GitLens (`eamodio.gitlens`) para contexto de commits.
- Error Lens (`usernamehw.errorlens`) para ver errores en línea.
- Spanish Language Pack (`MS-CEINTL.vscode-language-pack-es`) para interfaz en castellano.

## 5. Ajustes de VS Code sugeridos

Crea o actualiza `.vscode/settings.json`:

```json
{
  "editor.formatOnSave": true,
  "files.eol": "\n",
  "intelephense.files.maxSize": 5000000
}
```

## 6. Terminal integrada: comandos que sí usarás

```bash
docker compose up -d --build
docker compose ps
docker compose exec app bash
docker compose down
```

## 7. Checklist de verificación del alumno

- [ ] Dev Containers instalada.
- [ ] Intelephense activa en un `.php`.
- [ ] Docker Desktop en `Running`.
- [ ] Entorno levantado con `docker compose up -d --build`.
- [ ] Navegador abre `http://localhost:8080`.

## 8. Problemas típicos

> [!WARNING]
> VS Code no detecta bien el proyecto.
> Reabrir la carpeta raíz correcta (`mi-proyecto-php`).

> [!WARNING]
> Error al ejecutar `docker compose`.
> Comprobar Docker Desktop `Running` y abrir una terminal nueva.

> [!TIP]
> Si la máquina va justa de recursos, cerrar apps pesadas antes de levantar contenedores.
