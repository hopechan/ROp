<?php
require_once 'models/tipos.php';
            foreach($this->tipos as $item){
                $tipo =new Tipos();
                $tipo = $item;
    ?>
    <tr>
        <td hidden><?php echo $tipo->idtipo; ?></td>
        <td><?php echo $tipo->tipo; ?></td>
        <td><?php echo $tipo->descripcion; ?></td>
        <td>
        <a href="<?php echo constant('URL') . 'tipo/verTipo/' . $tipo->idtipo;?>" class="btnEditar btn-floating btn-medium waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></a>
        <button class="btnEliminar btn-floating btn-medium waves-effect waves-black btn-flat white-text red accent-4 btn " data-id="<?php echo $tipo->idtipo; ?>"><i class="material-icons">delete</i></button>
        </td>
    </tr>
    <?php
}
