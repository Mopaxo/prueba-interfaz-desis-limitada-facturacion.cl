<?php
require_once 'config/db.php';
require_once 'controllers/ProcessController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

$controller = new ProcessController();

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
