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
        $regions = $controller->getRegions();
        echo json_encode($regions); // Devuelve los datos como JSON para ser procesados por JavaScript
        break;
    case 'getComunas':
        $comunas = $controller->getComunas();
        echo json_encode($comunas); // Devuelve los datos como JSON para ser procesados por JavaScript
        break;
    case 'getCandidatos':
        $candidatos = $controller->getCandidatos();
        echo json_encode($candidatos); // Devuelve los datos como JSON para ser procesados por JavaScript
        break;
    case 'checkRUT':
        $exists = $controller->checkRUT();
        echo json_encode($exists); // Devuelve los datos como JSON para ser procesados por JavaScript
        break;
    case 'submitVote':
        $success = $controller->submitVote();
        echo json_encode($success); // Devuelve los datos como JSON para ser procesados por JavaScript
        break;
    case 'home':
    default:
        $regions = $controller->getRegions(); // Obtener regiones para el formulario
        $comunas = $controller->getComunas(); // Obtener comunas para el formulario
        $candidatos = $controller->getCandidatos(); // Obtener candidatos para el formulario
        require 'views/home.php';
        break;
}

?>
