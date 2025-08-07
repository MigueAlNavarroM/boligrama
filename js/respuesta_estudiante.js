function respuestaEstudiante(esEstudiante) {
    if (esEstudiante) {
        // Llama al script para crear la tabla temporal
        fetch("modelo/tabla_temporal.php")
            .then(response => response.text())
            .then(data => {
                console.log("✅ Tabla temporal creada");
                // Después de crear la tabla, carga la siguiente vista
                cargarSeccion("vista/seleccionar_trimestre.php");
            })
            .catch(error => {
                console.error("❌ Error al crear la tabla temporal:", error);
            });
    } else {
        alert("Por ahora solo se permite para estudiantes de TSI.");
        // Aquí podrías redirigir o cargar otra sección si lo deseas.
    }
}
