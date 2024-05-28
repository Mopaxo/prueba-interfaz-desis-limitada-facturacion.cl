<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/RegionModel.php';
require_once __DIR__ . '/../models/ComunaModel.php';
require_once __DIR__ . '/../models/CandidatoModel.php';
require_once __DIR__ . '/../models/VotoModel.php';

class ProcessController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? '';

        switch ($action) {
            case 'getRegions':
                return $this->getRegions();
            case 'getComunas':
                return $this->getComunas();
            case 'getCandidatos':
                return $this->getCandidatos();
            case 'checkRUT':
                return $this->checkRUT();
            case 'submitVote':
                return $this->submitVote();
            default:
                return ['error' => 'Acción no válida'];
        }
    }

    public function getRegions() {
        $model = new RegionModel($this->pdo);
        return $model->getAllRegions();
    }

    public function getComunas() {
        $region_id = $_GET['region_id'] ?? 0;
        $model = new ComunaModel($this->pdo);
        return $model->getComunasByRegion($region_id);
    }

    public function getCandidatos() {
        $model = new CandidatoModel($this->pdo);
        return $model->getAllCandidatos();
    }

    public function checkRUT() {
        $rut = $_POST['rut'] ?? '';
        $model = new VotoModel($this->pdo);
        return $model->checkRUT($rut);
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
}
?>
