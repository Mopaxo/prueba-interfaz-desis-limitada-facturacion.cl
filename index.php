<?php
require_once 'config/db.php';
require_once 'controllers/ProcessController.php';

// Crear una instancia de PDO
$pdo = obtenerConexionPDO(); // Reemplaza esto con tu lógica para obtener la conexión PDO

// Pasar el objeto PDO al constructor de ProcessController
$controller = new ProcessController($pdo);

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'getRegions':
        $controller->getRegions();
        break;
    case 'getComunas':
        $controller->getComunas();
        break;
    case 'getCandidatos':
        $controller->getCandidatos();
        break;
    case 'checkRUT':
        $controller->checkRUT();
        break;
    case 'submitVote':
        $controller->submitVote();
        break;
    case 'home':
    default:
        require 'views/home.php';
        break;
}

