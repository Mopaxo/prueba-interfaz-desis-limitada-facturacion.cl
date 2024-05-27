<?php
require 'db.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'getRegions') {
    // Obtener todas las regiones
    $stmt = $pdo->query('SELECT id, nombre FROM regiones');
    $regions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($regions);
} elseif ($action == 'getComunas') {
    // Obtener las comunas basadas en la región seleccionada
    $region_id = isset($_GET['region_id']) ? $_GET['region_id'] : 0;
    $stmt = $pdo->prepare('SELECT id, nombre FROM comunas WHERE region_id = ?');
    $stmt->execute([$region_id]);
    $comunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($comunas);
} elseif ($action == 'getCandidatos') {
    // Obtener todos los candidatos
    $stmt = $pdo->query('SELECT id, nombre FROM candidatos');
    $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($candidatos);
} else {
    echo json_encode(['error' => 'Acción no válida']);
}
?>
