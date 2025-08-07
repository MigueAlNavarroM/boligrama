<?php
include("../conexion.php");

// Verificar que llegaron todos los datos esperados
if (isset($_POST['clave'], $_POST['nombre'], $_POST['creditos'], $_POST['trimestre'])) {
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $creditos = $_POST['creditos'];
    $trimestre = $_POST['trimestre'];

    // Usar Prepared Statement para evitar inyección SQL
    $stmt = $conexion->prepare("INSERT INTO seleccion_temporal (clave, nombre, creditos, trimestre) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isii", $clave, $nombre, $creditos, $trimestre);

    if ($stmt->execute()) {
        echo "✅ Materia guardada exitosamente.";
    } else {
        echo "❌ Error al guardar la materia: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "⚠️ Faltan datos para guardar la materia.";
}

$conexion->close();
?>
