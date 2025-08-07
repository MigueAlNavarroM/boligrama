<?php
include_once("../conexion.php");

// Elimina la tabla temporal si existe
$conexion->query("DROP TEMPORARY TABLE IF EXISTS seleccion_temporal");

// Crea la tabla temporal
$conexion->query("
  CREATE TEMPORARY TABLE seleccion_temporal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave INT,
    nombre VARCHAR(100),
    creditos TINYINT,
    trimestre INT
  )
");
?>
