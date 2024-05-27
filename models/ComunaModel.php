<?php
require_once 'db.php';

class ComunaModel {
    public function getComunas($region_id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT id, nombre FROM comunas WHERE region_id = ?');
        $stmt->execute([$region_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
