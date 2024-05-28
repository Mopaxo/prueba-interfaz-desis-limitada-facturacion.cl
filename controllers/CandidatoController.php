<?php
require_once __DIR__ . '/../models/CandidatoModel.php';
require_once 'BaseController.php';

class CandidatoController extends BaseController {

    public function getCandidatos() {
        $model = new CandidatoModel($this->pdo);
        return $model->getAllCandidatos();
    }

    public function getCandidatosJson() {
        $data = $this->getCandidatos();
        $this->respond($data);
    }
}
?>
