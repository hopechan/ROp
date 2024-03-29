<html>
    <head>
        <title>Actualizar</title>
        <meta charset="utf-8">
    </head>
    <body onload="cargar_pagina()">
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    
<!--Modal para agregar-->
    <a href="#modal1" class="modal-trigger" id="a"></a>
    <div class="row tamaño">
        <div class="col s12 m12 l12">
            <div id="modal1" class="modal modal-fixed-footer tamaño">
                <div class="modal-content center-align">
                    <h4>Actualizar Estudiante</h4>
                    <form action="<?php echo constant('URL'); ?>estudiante/editar" method="post" class="col s12" enctype="multipart/form-data">
                        <input type="hidden" name="idestudiante" value="<?php echo $this->estudiante->idestudiante; ?>">
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="txtNombre" class="validate" id="nombre" value="<?php echo $this->estudiante->nombre; ?>">
                                <label for="nombre">Nombre:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="txtApellido" class="validate" id="apellido" value="<?php echo $this->estudiante->apellidos; ?>">
                                <label for="apellido">Apellidos:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">date_range</i>
                                <input type="date" name="fecha" id="fecha" class="validate" value="<?php echo $this->estudiante->fecha_nacimiento; ?>">
                                <label for="fecha">Fecha de Nacimiento:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">phone</i>
                                <input type="tel" name="telefono" id="tel" class="validate" value="<?php echo $this->estudiante->telefono; ?>">
                                <label for="tel">Teléfono:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">mail</i>
                                <input type="email" name="email" id="mail" class="validate" value="<?php echo $this->estudiante->email; ?>">
                                <label for="mail">e-mail:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">event</i>
                                <input type="number" name="anio" id="anio" class="validate" value="<?php echo $this->estudiante->anio; ?>">
                                <label for="anio">Año:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">home</i>
                                <input type="text" name="direccion" id="dir" class="validate" value="<?php echo $this->estudiante->direccion; ?>">
                                <label for="dir">Dirección:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">school</i>
                                <input type="text" name="centroescolar" id="ce" class="validate" value="<?php echo $this->estudiante->centro_escolar; ?>">
                                <label for="ce">Centro Escolar:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">group</i>
                                <input type="text" name="seccion" id="seccion" class="validate" value="<?php echo $this->estudiante->seccion; ?>">
                                <label for="seccion">Sección:</label>
                            </div>
                        </div>
                </div>
                <!-- footer del formulario modal 1 -->
                <div class="modal-footer">
                    <div class="center-align">
                        <button class="btn boton-save" type="submit" name="ok">
                            <i class="material-icons left">save</i>
                            Guardar </button> &nbsp;
                        <a class="btn boton-delete modal-close waves-effect" href="<?php echo constant('URL') ?>estudiante/ver"><i class="material-icons left">delete</i>
                            Cancelar
                        </a>
                    </div>
                </div>
                <!-- fin del footer del modal 1 -->
                </form>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
    </body>
</html>
<script src="<?php echo constant('URL')?>public/js/validacionestu.js"></script>
<script type="text/javascript">
    function cargar_pagina() {
        $('.modal').modal({
            dismissible: false,
        });
        document.getElementById("a").click();
    }
</script>