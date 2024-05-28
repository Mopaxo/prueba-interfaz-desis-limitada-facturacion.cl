<?php
class ComunaModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getComunasByRegion($region_id) {
        $stmt = $this->pdo->prepare('SELECT id, nombre FROM comunas WHERE region_id = ?');
        $stmt->execute([$region_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
