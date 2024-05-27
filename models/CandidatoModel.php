<?php
require_once 'db.php';

class CandidatoModel {
    public function getCandidatos() {
        global $pdo;
        $stmt = $pdo->query('SELECT id, nombre FROM candidatos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
