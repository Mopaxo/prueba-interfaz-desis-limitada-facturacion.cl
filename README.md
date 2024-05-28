# prueba-interfaz-desis-limitada-fracturacion.cl

Este repositorio contiene el desarrollo de la tarea asignada para el puesto de programador web de desis limitada.

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

- PHP 7.x (A Definir)
- MySQL 5.x (A definir)