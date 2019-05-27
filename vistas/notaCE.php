<?php
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
        <?php
        $cn = new ControladorNotaCe();
        $notas = $cn->notasEstudiante();
        for ($i=0; $i < sizeof($notas); $i++) { 
            echo "<tr>";
                echo "<td>".$notas[$i]->getIdestudiante()."</td>";
                echo "<td>".$notas[$i]->getIdtipo()."</td>";
                echo "<td>".$notas[$i]->getNota()."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>