<?php
// Este archivo se mostrará tras responder que sí es estudiante
?>

<div style="text-align:center; margin-bottom: 20px;">
    <h2>¿En qué trimestre te encuentras actualmente?</h2>
</div>

<div style="text-align: center; margin-bottom: 30px;">
    <select id="trimestre" style="font-size: 18px; padding: 10px 15px; border-radius: 5px;">
        <option value="">-- Selecciona --</option>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            echo "<option value=\"$i\">Trimestre $i</option>";
        }
        ?>
    </select>
</div>

<div style="text-align: center;">
    <button onclick="continuar()" style="padding: 10px 20px; font-size: 16px; background-color: #ff8c00; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Continuar
    </button>
</div>

<script>
    function continuar() {
        const trimestre = document.getElementById("trimestre").value;
        if (trimestre === "") {
            alert("Por favor selecciona un trimestre.");
            return;
        }
        cargarMaterias(trimestre); // Esta función está definida en materias.js
    }
</script>
