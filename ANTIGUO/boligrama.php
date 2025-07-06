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
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }


        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
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

        main {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            font-size: 19px;
            line-height: 1.6;
            text-align: justify;


        }

        main h2 {
            color: #ff8c00;
            margin-bottom: 10px;
        }

        main ul {
            margin-top: 0;
        }

        label {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 250px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            background-color: #ff8c00;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e06e00;
        }

        footer {
            margin-top: 60px;
            background-color: #585858;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 16px;
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


    </style>
</head>
<body>

<div class="page-wrapper">
    <header>
        <img src="img/uam_logo.png" alt="Logo UAM" height="50">
    <div>
            <h1>Licenciatura en Tecnologías y Sistemas de Información</h1>
            <div class="breadcrumb">
                <a href="http://dccd.cua.uam.mx/inicio">Inicio</a> /
                <a href="http://dccd.cua.uam.mx/Oferta-Educativa">Oferta Educativa</a> /
                <a href="http://dccd.cua.uam.mx/Licenciatura_en_Tecnologias_y_Sistemas_de_Informacion">Licenciatura</a> /
                <span>Boligrama Interactivo</span>
            </div>
        </div>
    </header>

    <main>
        <h2>Boligrama Interactivo</h2>
        <p>
            En este campo deberás seleccionar el trimestre del cual deseas obtener información. Este boligrama interactivo tiene un propósito meramente informativo, por lo que no mostrará datos específicos de cada alumno.
        </p>
        <p>
            En su lugar, se presentará una simulación general que, según el trimestre seleccionado, mostrará:
        </p>
        <ul>
            <li>Las materias que deben cursarse.</li>
            <li>Las que ya se han cursado.</li>
            <li>Las que están por cursarse. Además, se indicará cuántos créditos se obtienen por cada UEA inscrita, así como el porcentaje equivalente correspondiente al trimestre.</li>
        </ul>

        <form action="boligrama_resultado.php" method="GET" style="margin-bottom: 10px;">
            <label for="trimestre">Selecciona el trimestre:</label>
            <select name="trimestre" id="trimestre" required>
                <option value="">-- Selecciona --</option>
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option value=\"$i\">Trimestre $i</option>";
                    }
                ?>
            </select>
            <br>
            <button type="submit">Boligrama en tablas</button>
        </form>

        <form action="boligrama_nodos.php" method="GET">
            <input type="hidden" name="trimestre" id="trimestre_nodos">
            <button type="submit">Boligrama en nodos</button>
        </form>

        <script>
            // Copiar el valor del selector al segundo formulario
            document.getElementById('trimestre').addEventListener('change', function() {
                document.getElementById('trimestre_nodos').value = this.value;
            });
        </script>

    </main>

    <footer>
        Universidad Autónoma Metropolitana - Unidad Cuajimalpa | División de Ciencias de la Comunicación y Diseño
    </footer>
</div>

</body>

</html>
