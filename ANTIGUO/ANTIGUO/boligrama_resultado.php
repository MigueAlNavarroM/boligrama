<?php
$trimestre = isset($_GET['trimestre']) ? (int) $_GET['trimestre'] : 0;

if ($trimestre < 1 || $trimestre > 12) {
    echo "<p style='font-family:Arial; color:red;'>Trimestre inválido. <a href='boligrama.php'>Volver</a></p>";
    exit;
}

$conexion = new mysqli("localhost", "root", "Namm950924", "boligrama");
if ($conexion->connect_error) {
    die("Error al conectar: " . $conexion->connect_error);
}

$sql = "SELECT * FROM uea WHERE trimestre = $trimestre";
$resultado = $conexion->query($sql);

$sqlTotales = "SELECT COUNT(*) AS total_ueas, SUM(creditos) AS total_creditos, SUM(porcentaje) AS total_porcentaje FROM uea WHERE trimestre <= $trimestre";
$resumen = $conexion->query($sqlTotales)->fetch_assoc();

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <title>Trimestre <?php echo $trimestre; ?> | Boligrama</title>
    <style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    body {
        font-family: "Segoe UI", sans-serif;
        background-color: #f4f4f4;
        padding: 40px;
        margin-bottom: 80px;
    }

    h1 {
        color: #333;
        text-align: center;
        font-size: 50px;
        margin-bottom: 10px;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        font-size: 19px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        animation: fadeIn 0.6s ease-in-out;
    }

    th {
        background-color: #f28c28;
        color: white;
        padding: 10px;
        text-align: center;
        font-size: 19px;
        font-weight: bold;
    }

    td {
        background-color: #e9ecef;
        padding: 10px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    tr:hover td {
        background-color: #d6d8db;
    }

    .tabla-resumen {
        margin-top: 30px;
        width: 35%;
        margin-left: auto;
        margin-right: auto;
    }

    .contenedor-tablas {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 50vh;
        margin-top: 40px;
    }

    .navegacion {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 30px auto;
        width: 80%;
        font-size: 18px;
        color: #f28c28;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .navegacion a:hover {
        color: rgb(108, 105, 102);
    }

    .navegacion a i {
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .navegacion a:hover i {
        transform: scale(1.2);
    }

    a {
        color: #f28c28;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .volver {
        margin-top: 20px;
        text-align: center;
    }

    .progreso-global {
        width: 80%;
        margin: 20px auto 40px auto;
        text-align: center;
        font-size: 18px;
        animation: fadeIn 0.6s ease-in-out;
    }

    .barra {
        background-color: #ccc;
        border-radius: 20px;
        overflow: hidden;
        height: 24px;
        margin-top: 10px;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);
    }

    .relleno {
        background-color: #f28c28;
        height: 100%;
        width: 0;
        transition: width 0.8s ease-in-out;
    }


</style>

</head>
<body>

<header style="background-color:#4a4a4a; color:white; padding:12px 30px; display:flex; align-items:center; width:100%; position:fixed; top:0; left:0; z-index:1000;">
    <img src="img/uam_logo.png" alt="Logo UAM" height="50" style="margin-right:20px;">
    <div>
        <strong style="font-size:16px;">Licenciatura en Tecnologías y Sistemas de Información</strong><br>
        <nav style="font-size:13px; color:#f8a61a;">
            <a href='http://dccd.cua.uam.mx/inicio' style='color:#f8a61a; text-decoration:none;'>Inicio</a> /
            <a href='http://dccd.cua.uam.mx/Oferta-Educativa' style='color:#f8a61a; text-decoration:none;'>Oferta Educativa</a> /
            <a href='http://dccd.cua.uam.mx/Licenciatura_en_Tecnologias_y_Sistemas_de_Informacion' style='color:#f8a61a; text-decoration:none;'>Licenciatura</a> /
            <span style='color:#ccc;'>Boligrama Interactivo</span>
        </nav>
    </div>
</header>
<div style="margin-top:90px;"></div> <!-- Espacio para compensar header fijo -->


<h1>Trimestre <?php echo $trimestre; ?></h1>
<div class="contenedor-tablas">
<?php if ($resultado->num_rows > 0): ?>
    <table border="1">
        <tr>
            <th>UEA por cursar</th>
            <th>Créditos</th>
            <th>Porcentaje de Carrera</th>
            <th>Clave</th>
            <th>Seriación</th>
            <th>Consejos / Condiciones</th>
        </tr>
        <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['creditos']; ?></td>
                <td><?php echo number_format($fila['porcentaje'], 2); ?>%</td>
                <td><?php echo $fila['clave']; ?></td>

                <?php
                $clave_seriada = trim($fila['seriacion']); // elimina espacios
                $celdaSeriacion = $clave_seriada;

                if (ctype_digit($clave_seriada)) { // acepta cadena de solo dígitos
                    $conexion2 = new mysqli("localhost", "root", "Namm950924", "boligrama");
                    $sqlTrimestre = "SELECT trimestre FROM uea WHERE clave = '$clave_seriada' LIMIT 1";
                    $resultadoTrimestre = $conexion2->query($sqlTrimestre);

                    if ($resultadoTrimestre && $resultadoTrimestre->num_rows > 0) {
                        $filaTrimestre = $resultadoTrimestre->fetch_assoc();
                        $trimestreDestino = $filaTrimestre['trimestre'];

                        $celdaSeriacion = "<a href='boligrama_resultado.php?trimestre=$trimestreDestino'>$clave_seriada</a>";
                    }

                    $conexion2->close();
                }
                ?>

                <td><?php echo $celdaSeriacion; ?></td>
                <td><?php echo $fila['condiciones']; ?></td>
            </tr>
        <?php endwhile; ?>


    </table>

    <div class="tabla-resumen">
        <table border="1">
            <tr>
                <th>UEA´s Globales</th>
                <th>Créditos Globales</th>
                <th>Porcentaje Global</th>
            </tr>
            <tr>
                <td><?php echo $resumen['total_ueas']; ?>/52</td>
                <td><?php echo $resumen['total_creditos']; ?>/459</td>
                <td>
                    <?php 
                        $porcentajeGlobal = min($resumen['total_porcentaje'], 100);
                        echo number_format($porcentajeGlobal, 2) . '%'; 
                    ?>
                </td>

            </tr>
        </table>
    </div>
</div>

<div class="progreso-global">
    <div class="barra">
        <div class="relleno" style="width: <?php echo min(100, number_format($resumen['total_porcentaje'], 2)); ?>%;"></div>
    </div>
    <?php $avanceGeneral = min($resumen['total_porcentaje'], 100); ?>
    <p><strong>Avance general:</strong> <?php echo number_format($avanceGeneral, 2); ?>%</p>

</div>


    <div class="navegacion">
        <?php if ($trimestre > 1): ?>
            <a href="boligrama_resultado.php?trimestre=<?php echo $trimestre - 1; ?>">
                <i class="fas fa-chevron-left"></i> Trimestre anterior
            </a>
        <?php else: ?>
            <span></span>
        <?php endif; ?>

        <?php if ($trimestre < 12): ?>
            <a href="boligrama_resultado.php?trimestre=<?php echo $trimestre + 1; ?>">
                Trimestre siguiente <i class="fas fa-chevron-right"></i>
            </a>
        <?php endif; ?>
    </div>




<?php else: ?>
    <p>No se encontraron materias para este trimestre.</p>
<?php endif; ?>

<div class="volver">
    <a href="boligrama.php">← Volver al selector</a>
</div>

<footer style="background-color:#4a4a4a; color:white; text-align:center; padding:15px; position:fixed; bottom:0; left:0; width:100%; z-index:1000;">
    Universidad Autónoma Metropolitana - Unidad Cuajimalpa | División de Ciencias de la Comunicación y Diseño
</footer>

</body>
</html>
























