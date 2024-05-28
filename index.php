<?php
require_once 'config/db.php';
require_once 'controllers/RegionController.php';
require_once 'controllers/ComunaController.php';
require_once 'controllers/CandidatoController.php';
require_once 'controllers/VotoController.php';

// Crear una instancia de PDO
$pdo = obtenerConexionPDO(); // Reemplaza esto con tu lógica para obtener la conexión PDO

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'getRegions':
        (new RegionController($pdo))->getRegionsJson();
        break;
    case 'getComunas':
        (new ComunaController($pdo))->getComunasJson();
        break;
    case 'getCandidatos':
        (new CandidatoController($pdo))->getCandidatosJson();
        break;
    case 'checkRUT':
        (new VotoController($pdo))->checkRUTJson();
        break;
    case 'submitVote':
        (new VotoController($pdo))->submitVoteJson();
        break;
    case 'home':
    default:
        $regionController = new RegionController($pdo);
        $comunaController = new ComunaController($pdo);
        $candidatoController = new CandidatoController($pdo);

        $regions = $regionController->getRegions(); // Obtener regiones para el formulario
        $comunas = $comunaController->getComunas(); // Obtener comunas para el formulario
        $candidatos = $candidatoController->getCandidatos(); // Obtener candidatos para el formulario
        require 'views/home.php';
        break;
}
?>
