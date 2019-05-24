<?php
include("head.php");
include("navbar.php");
?>
<div class="container">
    <!-- modal trigger 1 -->
    <div class="row">
        <div class="col s12 center">
            <p>Agregar Tipo</p>
            <a href="#modal1" class="btn-floating btn-large waves-effect green btn modal-trigger"><i class="material-icons">add</i></a>
        </div>
    </div>
    <!-- formulario modal 1 -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4 class="center">Nuevo Tipo</h4>
            <form action="" method="post" class="col s12">
                <div class="row red-text text-accent-4">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">rate_review</i>
                        <input type="text" name="tipo" id="Tipo" class="validate" required>
                        <label for="Tipo">Tipo</label>
                        <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                    </div>
                </div>
                <div class="row red-text text-accent-4">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <input type="text" name="descripcion" id="Descripcion" class="validate" data-length="120" required>
                        <label for="Descripcion">Descripción</label>
                        <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                    </div>
                </div>
                <!-- footer del formulario modal -->
                <div class="center">
                    <button class="waves-effect waves-green btn green white-text" type="submit" name="ok">Enviar
                        <i class="material-icons left">send</i>
                    </button>&nbsp;&nbsp;
                    <a href="" class="modal-close waves-effect waves-red btn-flat white-text red accent-4 btn">Cancelar <i class="material-icons left">close</i></a>
                </div>
            </form>
            <?php
            if(isset($_POST['ok'])){
                
            }
            ?>
        </div>
    </div>
</div>
</div>
<div class="container">
    <table class="centered highlight responsive-table">
        <thead class="black white-text">
            <tr>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
        include("../controlador/controladorTipo.php");
        $ct = new ControladorTipo();
        $listaTipos = $ct->obtenerTipos();
        for ($i = 0; $i < sizeof($listaTipos); $i++) {
            echo "<tr>";
            echo "<td>" . $listaTipos[$i]->getTipo() . "</td>";
            echo "<td>" . $listaTipos[$i]->getDescripcion() . "</td>";
            echo "<td><a href='' class='btn-floating btn-large waves-effect red accent-4 btn'><i class='material-icons'>delete</i></a>&nbsp;&nbsp;
        <a href='' class='btn-floating btn-large waves-effect black accent-4 btn'><i class='material-icons'>replay</i></a></td>";
        }
        ?>
    </table>
</div>
<?php
include("footer.php");
?>