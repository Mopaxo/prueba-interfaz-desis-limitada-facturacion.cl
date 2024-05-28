<?php
function cargarVariablesDeEntorno($archivo) {
    if (!file_exists($archivo)) {
        throw new Exception("El archivo de entorno ($archivo) no existe.");
    }

    $variables = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($variables as $variable) {
        if (strpos(trim($variable), '#') === 0) {
            continue; // Saltar comentarios
        }
        list($nombre, $valor) = explode('=', $variable, 2);
        $_ENV[trim($nombre)] = trim($valor);
    }
}

cargarVariablesDeEntorno(__DIR__ . '/../.env');
?>
