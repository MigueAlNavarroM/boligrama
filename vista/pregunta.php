<h2>¿Eres estudiante de la Licenciatura de Tecnologías y Sistemas de Información?</h2>
<button onclick="respuestaEstudiante('si')">SÍ</button>
<button onclick="respuestaEstudiante('no')">NO</button>

<script>
function respuestaEstudiante(respuesta) {
    console.log("Respuesta seleccionada:", respuesta);

    if (respuesta === 'si') {
        // Crear tabla temporal
        fetch('modelo/tabla_temporal.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al crear la tabla temporal');
                }
                return response.text();
            })
            .then(() => {
                // Cargar siguiente sección
                return fetch('vista/seleccionar_trimestre.php');
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('contenido').innerHTML = html;
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Ocurrió un problema al avanzar: " + error.message);
            });
    } else {
        // En el futuro podrás mostrar otra sección si no es estudiante
        alert("Opción para no estudiantes aún no implementada.");
    }
}
</script>
