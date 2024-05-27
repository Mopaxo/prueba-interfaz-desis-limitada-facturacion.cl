<?php
require_once '/db.php';

class RegionController {
    public function getRegions() {
        global $pdo;
        $stmt = $pdo->query('SELECT id, nombre FROM regiones');
        $regions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($regions);
    }
}
?>
