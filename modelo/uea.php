<?php
function obtenerUEAsPorTrimestre($conexion, $id_trimestre) {
    $sql = "SELECT u.clave, u.nombre, u.creditos, r.descripcion AS recomendacion
            FROM UEA u
            LEFT JOIN Recomendacion r ON u.id_recomendacion = r.id_recomendacion
            WHERE u.id_trimestre = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_trimestre);
    $stmt->execute();
    return $stmt->get_result();
}
?>
