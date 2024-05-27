<?php
require_once '/db.php';

class ComunaController {
    public function getComunas($region_id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT id, nombre FROM comunas WHERE region_id = ?');
        $stmt->execute([$region_id]);
        $comunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($comunas);
    }
}
?>
