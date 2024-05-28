<?php
class CandidatoModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllCandidatos() {
        $stmt = $this->pdo->query('SELECT id, nombre FROM candidatos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
