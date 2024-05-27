<?php
require_once 'db.php';

class RegionModel {
    public function getRegions() {
        global $pdo;
        $stmt = $pdo->query('SELECT id, nombre FROM regiones');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
