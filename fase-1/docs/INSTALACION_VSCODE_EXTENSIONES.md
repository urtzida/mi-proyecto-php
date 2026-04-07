# Instalacion de Visual Studio Code y extensiones

[![VS Code](https://img.shields.io/badge/VS%20Code-Setup-007ACC?logo=visualstudiocode&logoColor=white)](https://code.visualstudio.com/)
[![Docker Extension](https://img.shields.io/badge/Extension-Docker-2496ED?logo=docker&logoColor=white)](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker)

Guia rapida para dejar el editor listo para trabajar en este proyecto.

## Indice

- [Previo obligatorio](#previo-obligatorio)
- [Instalar VS Code](#instalar-vs-code)
- [Extensiones clave](#extensiones-clave)
- [Ajustes recomendados](#ajustes-recomendados)
- [Checklist](#checklist)

## Previo obligatorio

1. Instala [Docker Desktop](https://www.docker.com/products/docker-desktop/).
2. Confirma estado `Running`.
3. Activa WSL2 en Docker Desktop.

Verifica:

```bash
docker --version
docker compose version
```

## Instalar VS Code

1. Descarga: [code.visualstudio.com](https://code.visualstudio.com/).
2. Instala version de Windows.
3. Abre carpeta raiz `mi-proyecto-php`.

## Extensiones clave

| Extension | ID | Link |
|---|---|---|
| Containers (imprescindible) | `ms-azuretools.vscode-containers` | [Abrir](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-containers) |
| Docker | `ms-azuretools.vscode-docker` | [Abrir](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker) |
| PHP Intelephense | `bmewburn.vscode-intelephense-client` | [Abrir](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) |
| Dev Containers | `ms-vscode-remote.remote-containers` | [Abrir](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) |

## Ajustes recomendados

`.vscode/settings.json`:

```json
{
  "editor.formatOnSave": true,
  "files.eol": "\n",
  "intelephense.files.maxSize": 5000000
}
```

## Checklist

- [ ] Docker Desktop funcionando.
- [ ] VS Code abierto en la raiz del proyecto.
- [ ] Extensiones instaladas.
- [ ] `docker compose up -d --build` ejecuta sin errores.
- [ ] [http://localhost:8080](http://localhost:8080) responde.
