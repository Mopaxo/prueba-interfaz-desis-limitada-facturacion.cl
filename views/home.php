<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Votación</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
<form id="votingForm">
    <ul>
        <h1>Formulario de Votación</h1>
        <li>
            <label for="nombre">Nombre y Apellido:</label>
            <input type="text" id="nombre" name="nombre" required>
        </li>
        <li>
            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" required>
        </li>
        <li>
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" required>
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </li>
        <li>
            <label for="region">Región:</label>
            <select id="region" name="region" required>
                <?php foreach ($regions as $region): ?>
                    <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </li>
        <li>
            <label for="comuna">Comuna:</label>
            <select id="comuna" name="comuna" required>
                <?php foreach ($comunas as $comuna): ?>
                    <option value="<?php echo $comuna['id']; ?>"><?php echo $comuna['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </li>
        <li>
            <label for="candidato">Candidato:</label>
            <select id="candidato" name="candidato" required>
                <?php foreach ($candidatos as $candidato): ?>
                    <option value="<?php echo $candidato['id']; ?>"><?php echo $candidato['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </li>
        <li>
            <label>¿Cómo se enteró de nosotros?</label>
            <input type="checkbox" name="enterado[]" value="internet"> Internet
            <input type="checkbox" name="enterado[]" value="amigo"> Amigo
            <input type="checkbox" name="enterado[]" value="tv"> TV
        </li>
        <button type="submit">Votar</button>
    </ul>
</form>
<script src="public/js/script.js"></script>
</body>
</html>
