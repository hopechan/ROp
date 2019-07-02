<table class="centered highlight responsive-table" id="tabla">
    <thead class="black white-text">
        <tr>
            <th>Nombre</th>
            <th>Centro Escolar</th>
            <th>Sección</th>
            <th>Año</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'models/estudiantes.php';
        foreach ($this->estudiantes['registros'] as $item) {
            $estudiante = new Estudiantes();
            $estudiante = $item;
            ?>
            <tr id="fila-<?php echo $estudiante->idestudiante; ?>">
                <td><?php echo $estudiante->nombre . " " . $estudiante->apellidos; ?></td>
                <td><?php echo $estudiante->centro_escolar; ?></td>
                <td><?php echo $estudiante->seccion; ?></td>
                <td><?php echo $estudiante->anio; ?></td>
                <td>
                    <a href="#modal1" data-id="<?php echo $estudiante->idestudiante;?>" class="modal-trigger btn-floating waves-effect waves-white btn-flat white-text grey darken-3 btn actu"><i class="material-icons">refresh</i></a>&nbsp;&nbsp;
                    <a data-id="<?php echo $estudiante->idestudiante; ?>" class="btn-floating waves-effect waves-white btn-flat white-text red darken-3 btn elim"><i class="material-icons">delete</i></a>&nbsp;&nbsp;<a href="/" class="btn-floating btn grey darken-3 waves-effect"><i class="material-icons">account_circle</i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="row">
    <div class="col l12 m12 s12">
        <ul class="pagination center">
            <li class="disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
            <?php
            for ($i = 0; $i < $this->estudiantes['numero']; $i++) {
                $activa = "";
                if (isset($_GET['pagina'])) {
                    $pagina_activa = $_GET['pagina'];
                    if ($pagina_activa == ($i + 1)) {
                        $activa = "active black";
                    }
                } else {
                    $pagina_activa = 1;
                    if ($pagina_activa == ($i + 1)) {
                        $activa = "active black";
                    }
                }
                echo "<li class='waves-effect " . $activa . "' name='" . ($i + 1) . "' onclick='recargarx2(".($i+1).")'><a data-id='".($i+1)."' id='boton'>" . ($i + 1) . "</a></li>";
            }
            ?>
            <li class="disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
</div>
<script src="<?php echo constant('URL')?>/public/js/estu.js"></script>