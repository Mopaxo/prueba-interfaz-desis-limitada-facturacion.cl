<?php
class RegionModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllRegions() {
        $stmt = $this->pdo->query('SELECT id, nombre FROM regiones');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
