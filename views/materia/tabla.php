<!--Tabla de la vista de materia-->
<table id="tblMaterias" class="centered">
    <thead class="black white-text">
        <tr>
            <th hidden class="hide">Id materia</th>
            <th>Materia</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody-id">

        <?php
        require_once 'models/materias.php';
        foreach ($this->materias as $item) {
            $materia = new Materias();
            $materia = $item;
            ?>
            <tr id="fila-<?php echo $materia->idmateria; ?>">
                <td hidden class="hide"><?php echo $materia->idmateria; ?></td>
                <td><?php echo $materia->materia; ?></td>
                <td><?php echo $materia->tipo; ?></td>
                <!--botones-->
                <td><a href="<?php echo constant('URL') . 'materia/verMateria/' . $materia->idmateria; ?>" class="btn-floating btn-medium waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></button></a>
                    <button class="Eliminar btn btn-floating waves-effect waves-black white-text red accent-4" value="<?php echo $materia->idmateria; ?>"><i class="material-icons">delete</i></button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>