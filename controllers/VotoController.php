<?php
require_once '/db.php';

class VotoController {
    public function checkRUT($rut) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT COUNT(*) AS count FROM votos WHERE rut = ?');
        $stmt->execute([$rut]);
        $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        echo json_encode(['exists' => $count > 0]);
    }

    public function submitVote($nombre, $alias, $rut, $email, $region_id, $comuna_id, $candidato_id, $enterado) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO votos (nombre, alias, rut, email, region_id, comuna_id, candidato_id, enterado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $result = $stmt->execute([$nombre, $alias, $rut, $email, $region_id, $comuna_id, $candidato_id, $enterado]);
        echo json_encode(['success' => $result]);
    }
}
?>
