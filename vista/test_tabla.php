<?php
include_once("../conexion.php");

// Crear tabla temporal (si no existe)
$conexion->query("CREATE TEMPORARY TABLE IF NOT EXISTS seleccion_temporal (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave INT,
  nombre VARCHAR(100),
  creditos TINYINT,
  trimestre INT
)");

// Insertar materias simuladas (puedes cambiar estos valores)
$conexion->query("INSERT INTO seleccion_temporal (clave, nombre, creditos, trimestre) VALUES
  (4000005, 'Pensamiento Matemático', 9, 1),
  (4000008, 'Literacidad Académica', 9, 1),
  (4600000, 'Taller de Matemáticas', 8, 1)
");

// Mostrar los registros actuales de la tabla temporal
$resultado = $conexion->query("SELECT * FROM seleccion_temporal");

echo "<h2>Materias guardadas en la tabla temporal:</h2>";
echo "<table border='1' cellpadding='8'>";
echo "<tr><th>ID</th><th>Clave</th><th>Nombre</th><th>Créditos</th><th>Trimestre</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
  echo "<td>{$fila['id']}</td>";
  echo "<td>{$fila['clave']}</td>";
  echo "<td>{$fila['nombre']}</td>";
  echo "<td>{$fila['creditos']}</td>";
  echo "<td>{$fila['trimestre']}</td>";
  echo "</tr>";
}

echo "</table>";
?>
