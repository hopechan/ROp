<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
</head>

<body onload="cargar_pagina()">
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>

    <!-- contenedor que carga la vista principal -->
    <div id="toast">

    </div>
    <div id="root">

    </div>

    <!--Modal para agregar-->
    <div class="row tamaño">
        <div class="col s12 m12 l12">
            <div id="modal1" class="modal modal-fixed-footer tamaño">
                <div class="modal-content center-align">
                    <h4>Actualizar Estudiante</h4>
                    <form id="formulario" class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="Nombre" class="validate" id="nombre">
                                <label for="nombre">Nombre:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="Apellido" class="validate" id="apellido">
                                <label for="apellido">Apellidos:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">date_range</i>
                                <input type="date" name="fecha_nacimiento" id="fecha" class="validate">
                                <label for="fecha">Fecha de Nacimiento:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">phone</i>
                                <input type="tel" name="telefono" id="tel" class="validate">
                                <label for="tel">Teléfono:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">mail</i>
                                <input type="email" name="email" id="mail" class="validate">
                                <label for="mail">e-mail:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
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
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">school</i>
                                <input type="text" name="centro_escolar" id="ce" class="validate">
                                <label for="ce">Centro Escolar:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">group</i>
                                <input type="text" name="seccion" id="seccion" class="validate">
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
                        <a class="btn boton-delete modal-close waves-effect"><i class="material-icons left">delete</i>
                            Cancelar
                        </a>
                    </div>
                </div>
                <!-- fin del footer del modal 1 -->
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL') ?>public/js/estudiantes.js"></script>
    <script type="text/javascript">
        function cargar_pagina() {
            $('.modal').modal({
                dismissible: false,
            });
        }
    </script>
    <?php require 'views/footer.php' ?>
</body>
</html>