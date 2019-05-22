<!DOCTYPE html>
<html lang="es">
<?php
    include("head.php");
?>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="container">
        <div class="row">
            <h4>Nuevo Estudiante</h4>
        </div>
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s3"> 
                  <input type="text" name="txtNombre" class="validate"  id="primer_nombre"> 
                  <label for="primer_nombre">Nombre:</label>  
                </div>
                <div class="input-field col s3">
                    <input type="text" name="txtApellidos" class="validate" id="apellidos">
                    <label for="apellidos">Apellidos:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="date" name="Fecha" id="fecha" class="validated">
                    <label for="fecha">Fecha de Nacimiento:</label>
                </div>
                <div class="input-field col s3">
                    <input type="tel" name="telefono" id="tel" class="validated">
                    <label for="tel">Telefono:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="email" name="email" id="mail" class="validated">
                    <label for="mail">e-mail:</label>
                </div>
                <div class="input-field col s3">
                    <input type="number" name="anio" id="año" class="validated">
                    <label for="año">Año:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="direccion" id="dir" class="validated">
                    <label for="dir">Dirección:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="txtCentroescolar" id="ce" class="validated">
                    <label for="ce">Centro Escolar:</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="txtSeccion" id="seccion" class="validated">
                    <label for="seccion">Sección:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <button type="submit" class="btn waves-effect waves-green grey darken-3">Guardar
                        <i class="material-icons left">save</i>
                    </button>
                </div>
                <div class="input-field col s2">
                    <button type="submit" class="btn waves-effect waves-red grey darken-3">Cancelar
                        <i class="material-icons left">delete</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>