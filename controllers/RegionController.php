<?php
require_once __DIR__ . '/../models/RegionModel.php';
require_once 'BaseController.php';

class RegionController extends BaseController {

    public function getRegions() {
        $model = new RegionModel($this->pdo);
        return $model->getAllRegions();
    }

    public function getRegionsJson() {
        $data = $this->getRegions();
        $this->respond($data);
    }
}
?>
