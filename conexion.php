<?php
$host = "localhost";
$usuario = "boligrama";
$contrasena = "Boligrama2025";
$base_de_datos = "BDBOLIGRAMA";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Validar conexión
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Configurar codificación
$conexion->set_charset("utf8");
?>
