<?php
require_once("../conexion.php");
require_once("../modelo/uea.php");

if (isset($_GET['trimestre'])) {
    $trimestre = intval($_GET['trimestre']);
    $resultado = obtenerUEAsPorTrimestre($conexion, $trimestre);
} else {
    die("❌ No se especificó el trimestre.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UEAs del Trimestre <?= $trimestre ?></title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f8f8f8; }
    </style>
</head>
<body>

<h2>UEAs del Trimestre <?= $trimestre ?></h2>

<table>
    <thead>
        <tr>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Créditos</th>
            <th>Recomendación</th>
        </tr>
    </thead>
    <tbody>
        <?php while($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $fila['clave'] ?></td>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['creditos'] ?></td>
            <td><?= $fila['recomendacion'] ?? 'N/A' ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
