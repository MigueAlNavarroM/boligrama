<?php
include("../conexion.php");

// Verificar que llegaron los datos por POST
if (isset($_POST['trimestre'], $_POST['token'])) {
    $trimestre = intval($_POST['trimestre']);
    $token = $_POST['token'];

    // Obtener las materias correspondientes al trimestre
    $sql = "SELECT * FROM uea WHERE id_trimestre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $trimestre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<div style='text-align:center; margin-bottom: 20px; font-size: 22px; font-weight: bold;'>Oprime las UEAs cursadas en el trimestre $trimestre</div>";
        echo "<div style='display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;'>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<button 
                    onclick=\"guardarUEA(" . $fila['clave'] . ", '" . htmlspecialchars($fila['nombre'], ENT_QUOTES) . "', " . $fila['creditos'] . ", $trimestre)\"
                    style='padding: 15px 20px; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); border: none; background-color: #f0f0f0; cursor: pointer;'>
                    <strong>" . $fila['nombre'] . "</strong><br>
                    Créditos: " . $fila['creditos'] . "<br>
                    Clave: " . $fila['clave'] . "
                </button>";
        }

        echo "</div>";
    } else {
        echo "<p>No se encontraron materias para el trimestre seleccionado.</p>";
    }

    $stmt->close();
} else {
    echo "<p>⚠️ Faltan datos requeridos (trimestre o token).</p>";
}

$conexion->close();
?>
