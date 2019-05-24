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
        <!-- modal trigger 1 -->
        <div class="row">
            <div class="col s12">
                <h4>Control de Estudiantes</h4><br><br>
                <a href="#modal1" class="waves-effect grey darken-3 btn modal-trigger">Agregar Estudiante 
                <i class="material-icons left">add</i>
                </a>
            </div>
        </div>
        <!-- formulario modal 1 -->
        <div class="row">
            <div class="col s12">
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Nuevo Estudiante</h4>
                        <form action="" method="post" class="col s12">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="txtNombre" class="validate" id="nombre">
                                    <label for="nombre">Nombre:</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="txtApellido" class="validate" id="apellido">
                                    <label for="apellido">Apellido:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="date" name="fecha" id="fecha" class="validate">
                                    <label for="fecha">Fecha de Nacimiento:</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input type="tel" name="telefono" id="tel" class="validate">
                                    <label for="tel">Teléfono:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">mail</i>
                                    <input type="email" name="email" id="mail" class="validate">
                                    <label for="mail">e-mail:</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">event</i>
                                    <input type="number" name="anio" id="anio" class="validate">
                                    <label for="anio">Año:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">home</i>
                                    <input type="text" name="direccion" id="dir" class="validate">
                                    <label for="dir">Dirección:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">school</i>
                                    <input type="text" name="centroescolar" id="ce" class="validate">
                                    <label for="ce">Centro Escolar:</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">group</i>
                                    <input type="text" name="seccion" id="seccion" class="validate">
                                    <label for="seccion">Sección:</label>
                                </div>
                            </div>
                        </form>
                        <!-- footer del formulario modal -->
                        <div class="modal-footer">
                            <a href="" class="modal-close waves-effect waves-green btn-flat green white-text">Guardar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>