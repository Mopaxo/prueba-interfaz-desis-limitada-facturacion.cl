<?php
require_once '/db.php';

class CandidatoController {
    public function getCandidatos() {
        global $pdo;
        $stmt = $pdo->query('SELECT id, nombre FROM candidatos');
        $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($candidatos);
    }
}
?>
