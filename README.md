# prueba-interfaz-desis-limitada-fracturacion.cl

Este repositorio contiene el desarrollo de la tarea asignada para el puesto de programador web de Desis limitada.

# Interfaz Web para Sistema de Votación

Este proyecto es una aplicación simple de votación desarrollada en PHP sin el uso de frameworks. Permite a los usuarios seleccionar candidatos y enviar sus votos.

## Estructura del Proyecto
```
prueba-interfaz-desis-limitada-facturacion.cl/
├── config/
│   ├── db.php
│   └── env.php
├── controllers/
│   ├── BaseController.php
│   ├── CandidatoController.php
│   ├── ComunaController.php
│   ├── RegionController.php
│   └── VotoController.php
├── models/
│   ├── CandidatoModel.php
│   ├── ComunaModel.php
│   ├── RegionModel.php
│   └── VotoModel.php
├── public/
│   ├── css/
│   │   └── styles.css
│   └── js/
│       └── script.js
├── views/
│   └── home.php
├── .env
├── index.php
└── README.md
```
### Descripción de Directorios y Archivos

- `/config`: Contiene archivos de configuración del proyecto.
  - `db.php`: Archivo para la conexión a la base de datos.
  - `env.php`: Archivo para cargar las variables de entorno.
- `/controllers`: Contiene los controladores de la aplicación.
  - `BaseController.php`: Controlador base para heredar funcionalidades comunes.
  - `CandidatoController.php`, `ComunaController.php`, `RegionController.php`, `VotoController.php`: Controladores específicos para manejar las respectivas entidades.
- `/models`: Contiene los modelos de la aplicación.
  - `CandidatoModel.php`, `ComunaModel.php`, `RegionModel.php`, `VotoModel.php`: Modelos para interactuar con la base de datos.
- `/public`: Contiene archivos públicos como CSS y JavaScript.
  - `css/styles.css`: Archivo de estilos CSS.
  - `js/script.js`: Archivo de JavaScript para validaciones y Ajax.
- `/views`: Contiene las vistas de la aplicación.
  - `home.php`: Vista principal de la aplicación.
- `.env`: Archivo de variables de entorno (no debe subirse al repositorio).
- `index.php`: Punto de entrada principal de la aplicación.
- `README.md`: Este archivo, con instrucciones y documentación del proyecto.

## Requisitos del Sistema

- PHP 8.1.2
- MySQL 8.0.36

## Configuración del Proyecto Local

Instrucciones de instalación: (Linux/MacOs)

1. Instalación de PHP 8.1.2:
   - Descarga e instala PHP 8.1.2 desde el sitio web oficial de PHP (https://www.php.net/downloads)
   - Sigue las instrucciones de instalación para tu sistema operativo.
   - Asegúrate de instalar el módulo PHP para MySQL (`php-mysql`) ejecutando el siguiente comando en tu terminal:
   ```
   sudo apt-get install php-mysql
   ```

2. Instalación de MySQL 8.0.36:
   - Descarga e instala MySQL 8.0.36 desde el sitio web oficial de MySQL (https://dev.mysql.com/downloads/mysql/)
   - Sigue las instrucciones de instalación para tu sistema operativo.
    - Utiliza el archivo votaciones.sql proporcionado, ubicado en `proyecto/sql/votaciones.sql`, para importar la base de datos. Puedes usar el siguiente comando en tu terminal, para importar la base de datos:
    ```
    mysql -u usuario -p nombre_de_la_base_de_datos < proyecto/sql/votaciones.sql
    ```
    
Configuración de variables de entorno:

Es necesario configurar las variables de entorno para ejecutar el proyecto localmente. Asegúrate de crear un archivo `.env` en la raíz del proyecto con la configuración adecuada antes de comenzar. El archivo `.env` utiliza el siguiente formato:
```
DB_HOST=ejemplo_servidor
DB_NAME=ejemplo_base_de_datos
DB_USER=usuario_ejemplo
DB_PASS=contraseña_ejemplo
DB_CHARSET=utf8mb4
```
Deberás configurar los valores de las variables según la base de datos que utilices.

Ejecución del proyecto:

Para ejecutar el proyecto localmente, abre una terminal y navega hasta la carpeta raíz del proyecto. Luego, ejecuta el siguiente comando:
```
php -S localhost:8000
```
Este comando iniciará un servidor web local en el puerto 8000. Puedes acceder al proyecto desde tu navegador web visitando http://localhost:8000.

¡Listo! Ahora deberías poder ejecutar el proyecto localmente siguiendo estas instrucciones.