<?php
class VotoModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function checkRUT($rut) {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS count FROM votos WHERE rut = ?');
        $stmt->execute([$rut]);
        $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        return ['exists' => $count > 0];
    }

    public function submitVote() {
        try {
            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'alias' => $_POST['alias'] ?? '',
                'rut' => $_POST['rut'] ?? '',
                'email' => $_POST['email'] ?? '',
                'region_id' => $_POST['region'] ?? 0,
                'comuna_id' => $_POST['comuna'] ?? 0,
                'candidato_id' => $_POST['candidato'] ?? 0,
                'enterado' => isset($_POST['enterado']) ? json_encode($_POST['enterado']) : '[]'
            ];
            $model = new VotoModel($this->pdo);
            return $model->submitVote($data);
        } catch (Exception $e) {
            // Manejo del error
            return ['error' => 'Error al procesar el voto: ' . $e->getMessage()];
        }
    }
}
?>
