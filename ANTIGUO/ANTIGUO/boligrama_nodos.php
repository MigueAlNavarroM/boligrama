<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boligrama en Nodos</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100%;
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
        .layout {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
            padding: 30px;
            flex: 1;
        }
        main {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 1150px;
        }
        .titulo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .trimestre {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .trimestre-label {
            width: 160px;
            font-weight: bold;
        }
        .contenedor-nodos {
            display: flex;
            gap: 10px;
            flex-wrap: nowrap;
        }
        .nodo {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            background-color: #ffe;
            cursor: pointer;
            box-shadow: 2px 2px 4px #aaa;
            transition: background-color 0.3s;
            min-width: 180px;
            text-align: center;
            position: relative;
        }
        .nodo::after {
            content: attr(data-consejo);
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%);
            background: #333;
            color: white;
            padding: 6px 10px;
            border-radius: 6px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            font-size: 13px;
            z-index: 999;
            max-width: 320px;
            text-align: center;
            white-space: normal; /* <<< permite saltos de línea */
            word-wrap: break-word; /* <<< para dividir texto largo */
        }


        .nodo:hover::after {
            opacity: 1;
        }
        .nodo.activo {
            background-color: #ffa500;
            color: white;
        }
        .sidebar {
            width: 300px;
            position: sticky;
            top: 30px;
        }
        .barra-progreso {
            height: 20px;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 15px;
        }
        .barra-progreso-interna {
            height: 100%;
            background-color: orange;
            width: 0%;
            transition: width 0.3s;
        }
        .resumen table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .resumen th, .resumen td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        .acciones {
            text-align: right;
        }
        .acciones a {
            color: orange;
            text-decoration: none;
            font-weight: bold;
        }
        footer {
            background-color: #585858;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 16px;
        }
        .nodo.bloqueado {
            background-color: #ccc !important;
            cursor: not-allowed;
            opacity: 0.6;
            pointer-events: auto;
        }
        .botones-control {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-control {
            background-color: #ff8c00;
            color: white;
            padding: 10px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn-control:hover {
            background-color: #e07b00;
        }

    </style>
</head>
<body>
<div class="page-wrapper">
    <header>
        <img src="img/uam_logo.png" alt="Logo UAM">
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

    <div class="layout">
        <main>
            <?php
            $conexion = new mysqli("localhost", "root", "Namm950924", "boligrama");
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
            $sql = "SELECT * FROM uea ORDER BY trimestre, id";
            $resultado = $conexion->query($sql);
            $conexion->close();

            $trimestreActual = 0;

            if ($resultado->num_rows > 0):
                while ($fila = $resultado->fetch_assoc()):
                    if ($trimestreActual != $fila['trimestre']):
                        if ($trimestreActual != 0) {
                            echo "        </div>\n    </div>\n";
                        }
                        echo '<div class="trimestre">' . "\n";
                        echo '    <div class="trimestre-label">' . $fila['trimestre'] . ' Trimestre</div>' . "\n";
                        echo '    <div class="contenedor-nodos">' . "\n";
                        $trimestreActual = $fila['trimestre'];
                    endif;

                    $nombre = $fila['nombre'];
                    $creditos = $fila['creditos'];
                    $clave = $fila['clave'];
                    $seriacion = $fila['seriacion'];
                    $condiciones = htmlspecialchars($fila['condiciones'], ENT_QUOTES, 'UTF-8');

                    echo '        <div class="nodo" data-creditos="' . $creditos . '"';
                    if (!empty($seriacion)) {
                        echo ' data-seriacion="' . $seriacion . '"';
                    }
                    if (!empty($condiciones)) {
                        echo ' data-consejo="' . $condiciones . '"';
                    }
                    echo '>' . $nombre . '<br>' . $creditos . '<br>' . $clave . '</div>' . "\n";
                endwhile;
                echo "        </div>\n    </div>\n";
            endif;
            ?>
            
        </main>

        <div class="sidebar">
            <div class="barra-progreso">
                <div class="barra-progreso-interna" id="barraProgreso"></div>
            </div>
            <div class="resumen">
                <table>
                    <thead>
                        <tr>
                            <th>UEA's Globales</th>
                            <th>Créditos Globales</th>
                            <th>Porcentaje Global</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="ueasTotales">0</td>
                            <td id="creditosTotales">0</td>
                            <td id="porcentajeGlobal">0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="botones-control">
                <a href="ver_resumen.html" class="btn-control">Ver resumen</a>
                <a href="boligrama.php" class="btn-control">Volver al selector</a>
                <button class="btn-control" onclick="borrarSeleccion()">Borrar selección</button>
            </div>

        </div>
    </div>

    <footer>
        Universidad Autónoma Metropolitana - Unidad Cuajimalpa | División de Ciencias de la Comunicación y Diseño
    </footer>
</div>

<script>
    const nodos = document.querySelectorAll('.nodo');
    // Al cargar la página: activar materias guardadas en localStorage
    document.addEventListener("DOMContentLoaded", () => {
        const resumenGuardado = JSON.parse(localStorage.getItem("resumenUEA")) || [];

        resumenGuardado.forEach(materia => {
            const nodo = Array.from(nodos).find(n => {
                const claveNodo = n.innerHTML.split('<br>')[2]?.trim();
                return claveNodo === materia.clave;
            });

            if (nodo && !nodo.classList.contains("activo")) {
                nodo.classList.add("activo");
                ueas++;
                creditos += parseInt(nodo.dataset.creditos);
            }
        });

        document.getElementById('ueasTotales').innerText = ueas;
        document.getElementById('creditosTotales').innerText = creditos;

        const porcentaje = ((creditos / totalCreditos) * 100).toFixed(2);
        document.getElementById('porcentajeGlobal').innerText = porcentaje + '%';
        document.getElementById('barraProgreso').style.width = porcentaje + '%';
    });

    let ueas = 0;
    let creditos = 0;
    const totalCreditos = 459;

    function mostrarMensaje(mensaje) {
        const msg = document.getElementById("mensaje-seriacion");
        msg.innerText = mensaje;
        msg.style.display = "block";
        setTimeout(() => {
            msg.style.display = "none";
        }, 3000);
    }

    function getNodoPorClave(clave) {
        return Array.from(nodos).find(nodo => {
            const partes = nodo.innerHTML.split('<br>');
            return partes.length > 2 && partes[2].trim() === clave;
        });
    }

    function actualizarBloqueos() {
        nodos.forEach(nodo => {
            const seriacion = nodo.dataset.seriacion;
            if (seriacion && seriacion !== "A") {
                const nodoSeriado = getNodoPorClave(seriacion);
                if (!nodoSeriado || !nodoSeriado.classList.contains('activo')) {
                    nodo.classList.add('bloqueado');
                } else {
                    nodo.classList.remove('bloqueado');
                }
            }
        });
    }

    nodos.forEach(nodo => {
        nodo.addEventListener('click', () => {
            if (nodo.classList.contains('bloqueado')) {
                mostrarMensaje("Primero activa la materia seriada correspondiente.");
                return;
            }

            let resumen = JSON.parse(localStorage.getItem("resumenUEA")) || [];

            const nombre = nodo.innerHTML.split('<br>')[0].trim();
            const valorCreditos = parseInt(nodo.dataset.creditos);
            const clave = nodo.innerHTML.split('<br>')[2]?.trim() || '';
            const consejo = nodo.getAttribute("data-consejo") || '';
            const etiqueta = nodo.closest('.trimestre')?.querySelector('.trimestre-label')?.textContent.trim() || '-';
            const trimestre = etiqueta.match(/\d+/)?.[0] + ' Trimestre'; // Extrae solo el número


            if (!nodo.classList.contains('activo')) {
                nodo.classList.add('activo');
                ueas++;
                creditos += valorCreditos;

                // Solo agregar si no existe esta misma materia por clave y trimestre
                if (!resumen.some(item => item.clave === clave && item.trimestre === trimestre)) {
                    resumen.push({ nombre, creditos: valorCreditos, clave, consejo, trimestre });
                }

            } else {
                nodo.classList.remove('activo');
                ueas--;
                creditos -= valorCreditos;

                // Eliminar esa materia específica por clave y trimestre
                resumen = resumen.filter(item => !(item.clave === clave && item.trimestre === trimestre));
            }

            document.getElementById('ueasTotales').innerText = ueas;
            document.getElementById('creditosTotales').innerText = creditos;

            const porcentaje = ((creditos / totalCreditos) * 100).toFixed(2);
            document.getElementById('porcentajeGlobal').innerText = porcentaje + '%';
            document.getElementById('barraProgreso').style.width = porcentaje + '%';

            localStorage.setItem("resumenUEA", JSON.stringify(resumen));
            actualizarBloqueos();
        });

    });

    actualizarBloqueos(); // aplicar al cargar la página

    function borrarSeleccion() {
        // Limpiar almacenamiento local
        localStorage.removeItem("resumenUEA");

        // Desmarcar todos los nodos activos
        document.querySelectorAll(".nodo.activo").forEach(nodo => {
            nodo.classList.remove("activo");
        });

        // Reiniciar contadores
        ueas = 0;
        creditos = 0;
        document.getElementById('ueasTotales').innerText = ueas;
        document.getElementById('creditosTotales').innerText = creditos;
        document.getElementById('porcentajeGlobal').innerText = '0.00%';
        document.getElementById('barraProgreso').style.width = '0%';

        // Vuelve a bloquear según seriaciones
        actualizarBloqueos();
    }


</script>



<div id="mensaje-seriacion" style="
    display: none;
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #ff8c00;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    font-weight: bold;
    z-index: 1000;
">
    Esta materia requiere activar su seriada.
</div>

</body>
</html>
