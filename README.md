# Instalación y Configuración

Este proyecto está desarrollado en **Laravel** y requiere unos pasos sencillos para estar en funcionamiento en tu máquina local.


## Requisitos

- PHP >= 8.x
- Composer
- Node.js y NPM
- MySQL


---

## Pasos de instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/luistorres17/Devfolio.git
cd Devfolio
```

### 2. Instalar dependencias PHP (backend)

```bash
composer install
```

### 3. Instalar dependencias JavaScript (frontend)

```bash
npm install
```

---

## 2 Formas de instalar el proyecto


### la primera mediante el asistente de instalación

#### 1. Crear archivo `.env`

Copia el archivo de ejemplo:

```bash
cp .env.example .env
```

#### 2. generar la llave de la aplicación

```bash
php artisan key:generate
```

#### 3. crea el enlace simbólico de la carpeta de archivos de caché

```bash
php artisan storage:link
```

#### 4. levanta el servidor de desarrollo

```bash
php artisan serve
```

#### 5. compila los assets de frontend

```bash
npm run dev
```

#### 6. accede desde tu navegador a:  
> [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

#### 6. sigue los pasos de instalación en la web de la aplicación

en ocaciones es necesario recargar al finalizar el ultimo paso de instalación.


### la segunda mediante el terminal

#### 1. Crear archivo `.env`

Copia el archivo de ejemplo:

```bash
cp .env.example .env
```

#### 2. Configurar base de datos
Edita el archivo `.env` y coloca tus datos de conexión MySQL:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

APP_INSTALLED=true

SESSION_DRIVER=database
```

---


#### 3. Generar la llave de la aplicación

```bash
php artisan key:generate
```

#### 4.  Ejecutar migraciones

```bash
php artisan migrate
```

*(ejecutar también los seeders)*

```bash
php artisan db:seed
```

#### 5. Crear enlace simbólico de la carpeta de archivos de caché

```bash
php artisan storage:link
```

---

#### 6. Levantar el servidor de desarrollo

```bash
php artisan serve
```

Accede desde tu navegador a:  
> [http://127.0.0.1:8000](http://127.0.0.1:8000)

---


#### 7. compila los assets de frontend

```bash
npm run dev
```

## Notas adicionales

- Si haces cambios en los archivos de configuración, limpia cachés:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

- Para compilar los assets de frontend:

```bash
npm run dev
```
o en modo producción:

```bash
npm run build
```

---

## Créditos

Proyecto desarrollado por **Luis Fernando** 🚀  
¡Gracias por apoyar este repositorio!

![Reaver](https://media.tenor.com/zZFdvazBM_YAAAAM/reaver-starcraft.gif)

## Licencia

Este proyecto está licenciado bajo los términos de la [Licencia Pública General GNU v3](LICENSE).
