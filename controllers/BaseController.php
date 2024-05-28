<?php

class BaseController {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    protected function respond($data) {
        echo json_encode($data);
    }
}

?>
