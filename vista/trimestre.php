<div style="text-align:center;">
    <h2>Selecciona el último trimestre cursado</h2>
    <select id="trimestreSeleccionado">
        <option value="">-- Selecciona un trimestre --</option>
        <?php for ($i = 1; $i <= 12; $i++): ?>
            <option value="<?= $i ?>">Trimestre <?= $i ?></option>
        <?php endfor; ?>
    </select>
    <br><br>
    <button onclick="continuar()">Continuar</button>
</div>

<script>
function continuar() {
    const trimestre = document.getElementById("trimestreSeleccionado").value;

    if (trimestre !== "") {
        // Guardar el trimestre actual en LocalStorage
        localStorage.setItem("trimestreActual", trimestre);

        // Llamar a materias.php con el trimestre como parámetro GET
        fetch(`vista/materias.php?trimestre=${trimestre}`)
            .then(res => res.text())
            .then(html => {
                document.getElementById("contenido").innerHTML = html;
            })
            .catch(error => {
                console.error("Error al cargar materias:", error);
            });
    } else {
        alert("Selecciona un trimestre para continuar.");
    }
}
</script>
