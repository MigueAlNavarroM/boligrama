<?php
$host = "localhost";
$usuario = "root";
$contrasena = "Namm950924";  // Por defecto en XAMPP no hay contraseña
$base_de_datos = "BDBOLIGRAMA";  // Asegúrate de que así se llame tu base

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar si hubo error al conectar
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Opcional: para soportar caracteres especiales como acentos y ñ
$conexion->set_charset("utf8");
?>
