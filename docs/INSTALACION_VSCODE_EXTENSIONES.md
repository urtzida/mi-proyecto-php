# Instalación de Visual Studio Code y extensiones (v1)

**Autor: Urtzi**

Guía rápida en castellano para preparar el entorno de IMAW con PHP en Windows.

## 0. Previo: instalar Docker Desktop (Windows)

1. Descargar Docker Desktop: https://www.docker.com/products/docker-desktop/
2. Instalarlo con opciones por defecto.
3. Abrir Docker Desktop y verificar estado "Running".
4. En `Settings > General`, activar `Use the WSL 2 based engine`.

Comprobación en PowerShell:

```bash
docker --version
docker compose version
```

## 1. Instalar Visual Studio Code

1. Ir a la web oficial: https://code.visualstudio.com/
2. Descargar la versión para Windows.
3. Instalar con opciones por defecto.

## 2. Abrir el proyecto

1. En VS Code, usar `Archivo > Abrir carpeta...`
2. Seleccionar la carpeta `mi-proyecto-php`.

## 3. Extensiones recomendadas (mínimas)

Instala estas extensiones desde la pestaña Extensiones (`Ctrl+Shift+X`):

- **PHP Intelephense** (`bmewburn.vscode-intelephense-client`)
  - Autocompletado, navegación y análisis de PHP.
- **PHP Debug** (`xdebug.php-debug`)
  - Depuración con Xdebug (para una futura v2 del entorno).
- **EditorConfig for VS Code** (`EditorConfig.EditorConfig`)
  - Mantener estilo consistente entre equipos.
- **DotENV** (`mikestead.dotenv`)
  - Resaltado para archivos `.env`.
- **Docker** (`ms-azuretools.vscode-docker`)
  - Gestión de contenedores y Compose desde VS Code.

## 4. Extensiones opcionales útiles

- **GitLens** (`eamodio.gitlens`): más contexto de Git.
- **Error Lens** (`usernamehw.errorlens`): errores visibles en línea.
- **Spanish Language Pack for Visual Studio Code** (`MS-CEINTL.vscode-language-pack-es`): interfaz en castellano.

## 5. Configuración básica recomendada

Crea `.vscode/settings.json` (si no existe) con:

```json
{
  "editor.formatOnSave": true,
  "files.eol": "\n",
  "intelephense.files.maxSize": 5000000
}
```

## 6. Terminal integrada para Docker

Comandos habituales en la terminal de VS Code:

```bash
docker compose up -d --build
docker compose ps
docker compose exec app bash
```

## 7. Verificación rápida

1. Abrir `src/index.php`.
2. Comprobar que Intelephense sugiere autocompletado.
3. Levantar contenedores y visitar `http://localhost:8080`.

## 8. Próxima mejora (v2)

- Añadir tareas de VS Code (`.vscode/tasks.json`) para levantar/parar Docker con un clic.
- Añadir configuración de depuración (`.vscode/launch.json`) para Xdebug.