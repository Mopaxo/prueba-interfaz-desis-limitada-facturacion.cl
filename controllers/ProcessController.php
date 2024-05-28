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
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'getRegions':
                $this->getRegions();
                break;
            case 'getComunas':
                $this->getComunas();
                break;
            case 'getCandidatos':
                $this->getCandidatos();
                break;
            case 'checkRUT':
                $this->checkRUT();
                break;
            case 'submitVote':
                $this->submitVote();
                break;
            default:
                echo json_encode(['error' => 'Acción no válida']);
                break;
        }
    }

    public function getRegions() {
        $model = new RegionModel($this->pdo);
        $regions = $model->getAllRegions();
    }

    public function getComunas() {
        $region_id = isset($_GET['region_id']) ? $_GET['region_id'] : 0;
        $model = new ComunaModel($this->pdo);
        $comunas = $model->getComunasByRegion($region_id);
    }

    public function getCandidatos() {
        $model = new CandidatoModel($this->pdo);
        $candidatos = $model->getAllCandidatos();
    }

    public function checkRUT() {
        $rut = isset($_POST['rut']) ? $_POST['rut'] : '';
        $model = new VotoModel($this->pdo);
        $exists = $model->checkRUT($rut);
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
        $success = $model->submitVote($data);
        require_once __DIR__ . '/../views/json_response.php';
    }
}

?>