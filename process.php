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
} elseif ($action == 'checkRUT') {
    // Validar si el RUT está duplicado
    $rut = isset($_POST['rut']) ? $_POST['rut'] : '';
    $stmt = $pdo->prepare('SELECT COUNT(*) AS count FROM votos WHERE rut = ?');
    $stmt->execute([$rut]);
    $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    echo json_encode(['exists' => $count > 0]);
} elseif ($action == 'submitVote') {
    // Guardar el voto en la base de datos
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $alias = isset($_POST['alias']) ? $_POST['alias'] : '';
    $rut = isset($_POST['rut']) ? $_POST['rut'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $region_id = isset($_POST['region']) ? $_POST['region'] : 0;
    $comuna_id = isset($_POST['comuna']) ? $_POST['comuna'] : 0;
    $candidato_id = isset($_POST['candidato']) ? $_POST['candidato'] : 0;
    $enterado = isset($_POST['enterado']) ? json_encode($_POST['enterado']) : '[]';

    $stmt = $pdo->prepare('INSERT INTO votos (nombre, alias, rut, email, region_id, comuna_id, candidato_id, enterado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $result = $stmt->execute([$nombre, $alias, $rut, $email, $region_id, $comuna_id, $candidato_id, $enterado]);

    echo json_encode(['success' => $result]);
} else {
    echo json_encode(['error' => 'Acción no válida']);
}
?>
