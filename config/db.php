<?php
require_once __DIR__ . '/env.php';

$host = $_ENV['DB_HOST'] ?? 'default_host';
$db   = $_ENV['DB_NAME'] ?? 'default_db';
$user = $_ENV['DB_USER'] ?? 'default_user';
$pass = $_ENV['DB_PASS'] ?? 'default_pass';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

function obtenerConexionPDO() {
    global $dsn, $user, $pass, $options;
    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>
