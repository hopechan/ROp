<?php
include("head.php");
include("navbar.php");
include("../controlador/controladorTipo.php");
$ct = new ControladorTipo();
$tipo = $ct->ObtenerTipoxid($_GET['idTipo']);
?>
<a class="waves-effect waves-light btn modal-trigger" href="#modal2">Modal</a>
<div class="container">
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4 class="center">Actualizar Tipo</h4>
            <form method="post" class="col s12">
                <div class="row red-text text-accent-4">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">rate_review</i>
                        <input type="text" name="tipo" id="Tipo" class="validate" value="<?php echo $tipo[0]->getTipo() ?>" required>
                        <label for="Tipo">Tipo</label>
                        <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                    </div>
                </div>
                <div class="row red-text text-accent-4">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <input type="text" name="descripcion" id="Descripcion" class="validate" value="<?php echo $tipo[0]->getDescripcion() ?>" required>
                        <label for="Descripcion">Descripción</label>
                        <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                    </div>
                </div>
                <!-- footer del formulario modal -->
                <div class="center">
                    <button href="/Rop/vistas/vistaTipo.php" class="waves-effect waves-green btn green white-text" type="submit" name="ok2">Actualizar
                        <i class="material-icons left">send</i>
                    </button>&nbsp;&nbsp;
                    <a href="/Rop/vistas/vistaTipo.php" class="modal-close waves-effect waves-red btn-flat white-text red accent-4 btn">Cancelar <i class="material-icons left">close</i></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ok2'])) {
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $actualizarTipo = new Tipo();
    $actualizarTipo->setIdtipo($_GET['idTipo']);
    $actualizarTipo->setTipo($tipo);
    $actualizarTipo->setDescripcion($descripcion);

    $ct->actualizarTipo($actualizarTipo);
    echo '<script type="text/javascript">
                        alert("Se ha actualizado el registro");
                        window.location="/Rop/vistas/vistaTipo.php";
                        </script>';
}
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include("footer.php") ?>