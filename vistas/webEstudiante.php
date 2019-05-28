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
                <a href="#modal1" class="waves-effect boton-g btn modal-trigger">Agregar Estudiante 
                <i class="material-icons left">group_add</i>
                </a>
            </div>
        </div>
        <!-- enlace a vistaEstudiante.php -->
        <div class="row">
            <div class="col s12 m12 l12">
                <a href="vistaEstudiante.php" class="btn waves-effect waves-light boton-g">
                <i class="material-icons left">group</i>
                Ver Estudiantes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>
        <!-- formulario modal 1 -->
        <div class="row tamaño">
            <div class="col s12">
                <div id="modal1" class="modal modal-fixed-footer tamaño">
                    <div class="modal-content center-align">
                        <h4>Nuevo Estudiante</h4>
                        <form action="" method="post" class="col s12" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12 m12 l6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="txtNombre" class="validate" id="nombre">
                                    <label for="nombre">Nombre:</label>
                                </div>
                                <div class="input-field col s12 m12 l6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="txtApellido" class="validate" id="apellido">
                                    <label for="apellido">Apellido:</label>
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
                            <div class="file-field input-field boton-g btn waves-effect">
                                    <i class="material-icons left">add_a_photo</i>
                                    <span>Fotografía</span>
                                    <input type="file" name="foto">
                            </div> &nbsp;
                            <button class="btn boton-save" type="submit" name="ok">
                            <i class="material-icons left">save</i>
                            Guardar </button> &nbsp;
                            <button class="btn boton-delete modal-close" name="nel">
                            <i class="material-icons left">delete</i>
                            Cancelar 
                            </button>
                        </div>
                    </div>
                    <!-- fin del footer del modal 1 -->
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <!-- inicio del codigo php -->
    <?php
        if (isset($_POST['ok'])) {

            #llamada a la entidad y al controlador
            require_once("../modelos/estudiante.php");
            require_once("../controlador/controladorestudiante.php");

            #toma de los datos de los campos del formulario modal 1
            $nombre=$_POST['txtNombre'];
            $apellidos=$_POST['txtApellido'];
            $fechanacimiento=$_POST['fecha'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $anio=$_POST['anio'];
            $direccion=$_POST['direccion'];
            $centroescolar=$_POST['centroescolar'];
            $seccion=$_POST['seccion'];

            #se crea un objeto estudiante y se llama al controlador estudiante
            $e = new Estudiante();
            $ce = new controladorestudiante();

            #se le pasan los parametros del formulario al objeto estudiante
            $e->setIdestudiante(null);
            $e->setNombre($nombre);
            $e->setApellidos($apellidos);
            $e->setFechanacimiento($fechanacimiento);
            $e->setTelefono($telefono);
            $e->setEmail($email);
            $e->setAnio($anio);
            $e->setDireccion($direccion);
            $e->setCentroescolar($centroescolar);
            $e->setSeccion($seccion);

            #se pasan envian los parametros a la funcion agregarEstudiante del controladorEstudiante
            $ce->agregarEstudiante($e);

            #llama el archivo seleccionado en la fotografia
            $foto=$_FILES['foto']['name'];
            $tipo_foto=$_FILES['foto']['type'];

            #ruta de la carpteta que guardara las imagenes
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT']. '/Rop/vistas/img/Fotos/' . $_FILES['foto']['name'];

            #mueve la iamgen a la carpeta de destino
            move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino.$foto);

            require_once ("../modelos/documento.php");
            require_once ("../controlador/controladorDocumento.php");

            #instacian el objeto documento y el controlador documento para guardar la ruta de la fotografia en db
            $d = new Documento();
            $cd = new ControladorDocumento();

            #se llama a la funcion MaxId para conocer el id del ultimo estudiante ingresado a la db y asignarle el id a la fotografia
            $idestudiantedoc = $cd->MaxId();

            //echo $carpeta_destino;

            #se recolectan los datos a enviar a la tabla documento de la db
            $d->setIdDocumento(null);
            $d->setIdestudiante($idestudiantedoc);
            $d->setTipoDocumento('Fotografía');
            $d->setDocumento($carpeta_destino);
            $d->setDescripcion('hola');

            #envian los datos a la tabla documento atraves de la funcion guardarDocumento
            $cd->guardarDocumento($d);

            #se ejecuta un script que confirma que los datos se guardaron correctamente
            // echo "<script>
            //         alert('Estudiante guardado con exito');
            //         window.location='webEstudiante.php';
            //       </script>";
        }
    ?>
    <?php
        include("footer.php");
        
    ?>
</body>
</html>