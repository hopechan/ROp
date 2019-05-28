<?php
    include_once("../controlador/controladornotace.php");
?>
<table class="striped table-responsive">
    <thead>
        <tr>
            <th data-field="estudiante" >Estudiante</th>
            <th data-field="materia" >Materia</th>
            <th data-field="nota" >Nota</th>
            <th data-field="opt" >Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cn = new ControladorNotaCe();
        $notas = $cn->notasEstudiante();
        for ($i=0; $i < sizeof($notas); $i++) { 
            echo "<tr>";
                echo "<td class=''>".$notas[$i]->getIdestudiante()."</td>";
                echo "<td class=''>".$notas[$i]->getIdtipo()."</td>";
                echo "<td class=''>".$notas[$i]->getNota()."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<ul class="pagination center">
  <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
  <li class="active"><a href="#!">1</a></li>
  <li class="waves-effect"><a href="#!">2</a></li>
  <li class="waves-effect"><a href="#!">3</a></li>
  <li class="waves-effect"><a href="#!">4</a></li>
  <li class="waves-effect"><a href="#!">5</a></li>
  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul>