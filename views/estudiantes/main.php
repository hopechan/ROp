<div class="container">
    <!-- inicia el contenido del cuerpo de la pagina index de estudiantes -->
    <div class="row">
        <div class="col s12 m6 l4">
            <div class="card horizontal">
                <div class="card-content black center" style="display:block;">
                    <span class="card-title activator white-text waves-effect">
                        Matrícula
                    </span>
                </div>
                <div class="card-image waves-effect waves-blue waves-block center black">
                    <a class="waves-effect modal-trigger" href="#modal1">
                        <i class="material-icons grey-text large">group_add</i>
                    </a>
                </div>
                <div class="card-reveal grey">
                    <span class="card-title black-text">
                        <i class="material-icons right">close</i>
                        Matricula a un estudiante
                    </span>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card horizontal">
                <div class="card-content black center" style="display:block;">
                    <span class="card-title activator white-text waves-effect">
                        Estudiantes
                    </span>
                </div>
                <div class="card-image waves-effect waves-blue waves-block center black">
                    <a href="<?php echo constant('URL')?>estudiante/verestudiante" id="estu">
                        <i class="material-icons grey-text large">group</i>
                    </a>
                </div>
                <div class="card-reveal grey">
                    <span class="card-title black-text">
                        <i class="material-icons right">close</i>
                        Visualiza los estudiantes
                    </span>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card horizontal">
                <div class="card-content black center" style="display:block;">
                    <span class="card-title activator white-text waves-effect">
                        Reportes
                    </span>
                </div>
                <div class="card-image waves-effect waves-blue waves-block center black">
                    <i class="material-icons grey-text large">book</i>
                </div>
                <div class="card-reveal grey">
                    <span class="card-title black-text">
                        <i class="material-icons right">close</i>
                        Redacta un reporte
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l4">
            <div class="card horizontal">
                <div class="card-content black center" style="display:block;">
                    <span class="card-title activator white-text waves-effect">
                        Primer Año
                    </span>
                </div>
                <div class="card-image waves-effect waves-blue waves-block center black">
                    <i class="material-icons grey-text large">looks_one</i>
                </div>
                <div class="card-reveal grey">
                    <span class="card-title black-text">
                        <i class="material-icons right">close</i>
                        Estudiantes de primer año
                    </span>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card horizontal">
                <div class="card-content black center" style="display:block;">
                    <span class="card-title activator white-text waves-effect">
                        Segundo Año
                    </span>
                </div>
                <div class="card-image waves-effect waves-blue waves-block center black">
                    <i class="material-icons grey-text large">looks_two</i>
                </div>
                <div class="card-reveal grey">
                    <span class="card-title black-text">
                        <i class="material-icons right">close</i>
                        Alumnos de segundo año
                    </span>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card horizontal">
                <div class="card-content black center" style="display:block;">
                    <span class="card-title activator white-text waves-effect">
                        Tercer Año
                    </span>
                </div>
                <div class="card-image waves-effect waves-blue waves-block center black">
                    <i class="material-icons grey-text large">looks_3</i>
                </div>
                <div class="card-reveal grey">
                    <span class="card-title black-text">
                        <i class="material-icons right">close</i>
                        Alumnos de tercer año
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Inicio del formulario modal -->
    <div class="row tamaño">
        <div class="col s12 m12 l12">
            <div id="modal1" class="modal modal-fixed-footer tamaño">
                <div class="modal-content center-align">
                    <h4>Nuevo Estudiante</h4>
                    <div class="row">
                        <form method="post" class="col s12"  id="formulario">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="txtNombre" class="validate" id="nombre">
                                <label for="nombre">Nombre:</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="txtApellido" class="validate" id="apellido">
                                <label for="apellido">Apellidos:</label>
                            </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">date_range</i>
                            <input type="date" name="fecha" id="fecha" class="validate">
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
                            <input type="text" name="centroescolar" id="ce" class="validate">
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
                        <button class="btn boton-save" type="submit" name="ok" id="ok">
                            <i class="material-icons left">save</i>
                            Guardar </button> &nbsp;
                        <a class="btn boton-delete modal-close waves-effect"><i class="material-icons left">delete</i>
                            Cancelar
                        </a>
                    </div>
                </div>
                <!-- Fin del footer del modal -->
            </div>
        </div>
    </div>
</div>
    <!-- Fin del footer del modal -->
            </div>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/validacionestu.js"></script>