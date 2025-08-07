// Función para guardar la materia seleccionada en la tabla temporal
function guardarUEA(clave, nombre, creditos, trimestre) {
    const token = localStorage.getItem('token_usuario');

    if (!token) {
        alert("No se encontró un token de usuario.");
        return;
    }

    fetch("controlador/guardar_materia.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `clave=${encodeURIComponent(clave)}&nombre=${encodeURIComponent(nombre)}&creditos=${creditos}&trimestre=${trimestre}&token=${token}`
    })
    .then(respuesta => respuesta.text())
    .then(resultado => {
        console.log("Resultado:", resultado);
        alert("✅ Materia guardada correctamente.");
    })
    .catch(error => {
        console.error("Error al guardar la materia:", error);
        alert("❌ Ocurrió un error al guardar la materia.");
    });
}

//Funcion cargar Materias
function cargarMaterias(trimestre) {
    const token = localStorage.getItem('token_usuario');

    if (!token) {
        alert("No se encontró un token de usuario.");
        return;
    }

    fetch("vista/materias.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `trimestre=${encodeURIComponent(trimestre)}&token=${token}`
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById("contenido").innerHTML = html;
    })
    .catch(error => {
        console.error("Error al cargar materias:", error);
        alert("❌ Error al cargar las materias.");
    });
}
