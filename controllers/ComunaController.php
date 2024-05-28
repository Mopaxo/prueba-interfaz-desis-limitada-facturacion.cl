<?php
require_once __DIR__ . '/../models/ComunaModel.php';
require_once 'BaseController.php';

class ComunaController extends BaseController {

    public function getComunas($region_id = 0) {
        $model = new ComunaModel($this->pdo);
        return $model->getComunasByRegion($region_id);
    }

    public function getComunasJson() {
        $region_id = $_GET['region_id'] ?? 0;
        $data = $this->getComunas($region_id);
        $this->respond($data);
    }
}
?>
