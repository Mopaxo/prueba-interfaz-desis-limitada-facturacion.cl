<?php
require_once __DIR__ . '/../models/VotoModel.php';
require_once 'BaseController.php';

class VotoController extends BaseController {

    public function checkRUT() {
        $rut = $_POST['rut'] ?? '';
        $model = new VotoModel($this->pdo);
        return $model->checkRUT($rut);
    }

    public function checkRUTJson() {
        $data = $this->checkRUT();
        $this->respond($data);
    }

    public function submitVote() {
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
    }

    public function submitVoteJson() {
        $data = $this->submitVote();
        $this->respond($data);
    }
}
?>
