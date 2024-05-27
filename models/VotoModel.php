<?php
require_once 'db.php';

class VotoModel {
    public function checkRUT($rut) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT COUNT(*) AS count FROM votos WHERE rut = ?');
        $stmt->execute([$rut]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] > 0;
    }

    public function submitVote($nombre, $alias, $rut, $email, $region_id, $comuna_id, $candidato_id, $enterado) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO votos (nombre, alias, rut, email, region_id, comuna_id, candidato_id, enterado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$nombre, $alias, $rut, $email, $region_id, $comuna_id, $candidato_id, $enterado]);
    }
}
?>
