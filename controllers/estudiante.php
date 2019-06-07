<?php
class Estudiante extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre

            
    }
    function render(){
        $this->view->render("estudiantes/index");
    }

    function verestudiante()
    {
        $this->view->render("estudiantes/verestudiante");
    }

    function insert()
        {
            //se reciven los datos del formulario de estudiante/index.php
            echo "Estoy por aqui";
            $nombre=$_POST['txtNombre'];
            $apellido=$_POST['txtApellido'];
            $fecha_nacimiento=$_POST['fecha'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $anio=$_POST['anio'];
            $direccion=$_POST['direccion'];
            $centroescolar=$_POST['centroescolar'];
            $seccion=$_POST['seccion'];

            $this->model->insert(['nombre'=>$nombre,'apellidos'=>$apellido, 'fecha_nacimiento'=>$fecha_nacimiento,'telefono'=>$telefono, 'email'=>$email, 'anio'=>$anio, 'direccion'=>$direccion, 'centro_escolar'=>$centroescolar, 'seccion'=>$seccion]);
            $this->render();
        }
    
}
?>