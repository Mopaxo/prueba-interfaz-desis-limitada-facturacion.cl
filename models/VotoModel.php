<?php
class VotoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function checkRUT($rut) {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS count FROM votos WHERE rut = ?');
        $stmt->execute([$rut]);
        $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        return ['exists' => $count > 0];
    }

    public function submitVote($data) {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO votos (nombre, alias, rut, email, region_id, comuna_id, candidato_id, enterado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$data['nombre'], $data['alias'], $data['rut'], $data['email'], $data['region_id'], $data['comuna_id'], $data['candidato_id'], $data['enterado']]);
            return ['success' => true];
        } catch (Exception $e) {
            // Manejo del error
            return ['error' => 'Error al procesar el voto: ' . $e->getMessage()];
        }
    }
}
?>
