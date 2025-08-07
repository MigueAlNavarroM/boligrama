function continuar() {
    const trimestre = document.getElementById("trimestre").value;
    if (trimestre === "") {
        alert("Por favor selecciona un trimestre.");
        return;
    }
    cargarMaterias(trimestre); // función ya definida en materias.js
}
