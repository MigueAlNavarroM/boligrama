<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boligrama Interactivo | UAM-Cuajimalpa</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #585858;
            color: white;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        header img {
            height: 50px;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        .breadcrumb {
            color: #ff8c00;
            font-size: 16px;
            margin-top: 8px;
            line-height: 1.5;
        }

        .breadcrumb a {
            color: #ff8c00;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb span {
            color: #ccc;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        footer {
            background-color: #585858;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 16px;
        }

        .logos-footer {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .logos-footer img {
            height: 50px;
        }
    </style>

    <script>
        // Función para cargar secciones por AJAX
        function cargarSeccion(nombreArchivo) {
            const contenedor = document.getElementById("contenido");
            fetch(nombreArchivo)
                .then(respuesta => respuesta.text())
                .then(html => {
                    contenedor.innerHTML = html;
                })
                .catch(error => {
                    contenedor.innerHTML = "<p>Error al cargar la sección.</p>";
                    console.error("Error al cargar:", error);
                });
        }

        window.onload = function() {
            cargarSeccion("vista/info.php"); // Primera pantalla al iniciar
        }
    </script>
</head>
<body>
<div class="page-wrapper">
    <header>
        <img src="img/uam_logo.png" alt="Logo UAM">
        <div>
            <h1>Licenciatura en Tecnologías y Sistemas de Información</h1>
            <div class="breadcrumb">
                <!--<a href="portafolio.php">Inicio</a> /--> Boligrama Interactivo 
            </div>
        </div>
    </header>

    <main>
        <div id="contenido">
            <!-- Aquí se cargarán las secciones por AJAX -->
        </div>
    </main>

    <footer>
        <div class="logos-footer">
            <img src="img/tsi_logo.png" alt="Logo TSI">
            <img src="img/dccd_logo.png" alt="Logo DCCD">
        </div>
    </footer>

    <!-- ✅ Cargar el token generado al iniciar -->
    <script src="js/token.js"></script>
    <script src="js/respuesta_estudiante.js"></script>
    <script src="js/materias.js"></script>
    <script src="js/continuar.js"></script>

</div>
</body>
</html>
