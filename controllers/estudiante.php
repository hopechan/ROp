<?php
class Estudiante extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre

            
    }
    function render(){
        $this->view->result = 0;
        $this->view->render("estudiantes/index");
    }

    function verestudiante()
    {
            if (isset($_GET['pagina'])){
                $pag = $_GET['pagina'];
                $estudiantes = $this->model->get($pag);
                $this->view->estudiantes = $estudiantes;
                $this->view->render('estudiantes/verestudiante');
            }else{
                $pag = 1;
                $estudiantes=$this->model->get($pag);
                $this->view->estudiantes = $estudiantes;
                $this->view->render("estudiantes/verestudiante"); 
            }
    }

    function insert()
        {
            //se reciven los datos del formulario de estudiante/index.php
            $nombre=$_POST['txtNombre'];
            $apellido=$_POST['txtApellido'];
            $fecha_nacimiento=$_POST['fecha'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $anio=$_POST['anio'];
            $direccion=$_POST['direccion'];
            $centroescolar=$_POST['centroescolar'];
            $seccion=$_POST['seccion'];

            $result = $this->model->insert(['nombre'=>$nombre,'apellidos'=>$apellido, 'fecha_nacimiento'=>$fecha_nacimiento,'telefono'=>$telefono, 'email'=>$email, 'anio'=>$anio, 'direccion'=>$direccion, 'centro_escolar'=>$centroescolar, 'seccion'=>$seccion]);
           $this->render('estudiantes/index');
        }

        function eliminar($dato=null)
        {
            $id = $dato[0];
            $this->model->eliminar($id);
            header('location:http://localhost/Rop/estudiante/verestudiante');
        }

        function subeditar($param = null)
        {
            $idestudiante = $param[0];
            $estudiante = $this->model->getById($idestudiante);
            $this->view->estudiante = $estudiante;
            $this->view->render('estudiantes/detalle');
        }

        function editar()
        {
            $idestudiante=$_POST['idestudiante'];
            $nombre=$_POST['txtNombre'];
            $apellido=$_POST['txtApellido'];
            $fecha_nacimiento=$_POST['fecha'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $anio=$_POST['anio'];
            $direccion=$_POST['direccion'];
            $centroescolar=$_POST['centroescolar'];
            $seccion=$_POST['seccion'];

            $this->model->actualizar(['idestudiante'=>$idestudiante, 'nombre'=>$nombre, 'apellidos'=>$apellido, 'fecha_nacimiento'=>$fecha_nacimiento, 'telefono'=>$telefono, 'email'=>$email, 'anio'=>$anio, 'direccion'=>$direccion, 'centro_escolar'=>$centroescolar, 'seccion'=>$seccion]);
            $this->verestudiante();
        }

        

    
}
?>