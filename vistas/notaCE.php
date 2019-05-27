<?php
    include_once("../controlador/controladorEstudiante.php");
    include_once("../controlador/controladorTipo.php");
    include_once("../controlador/controladornotace.php");
?>
<table class="striped table-responsive">
    <thead>
        <tr>
            <th data-field="estudiante">Estudiante</th>
            <th data-field="materia">Materia</th>
            <th data-field="nota">Nota</th>
            <th data-field="opt">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php llenarEstudiante()?>
    </tbody>
</table>