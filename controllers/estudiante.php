<?php
class Estudiante extends Controller
{
    function __construct()
    {
        parent::__construct(); //acceder al constructor de la clase padre

    }

    function render()
    {
        $this->view->render("estudiantes/index");
    }

    function verestudiante()
    {
        $this->view->render("estudiantes/verestudiante");
    }
    

    function ver()
    {
            $pag = $_GET['pagina'];
            $estudiantes = $this->model->get($pag);
            $this->view->estudiantes = $estudiantes;
            $this->view->render('estudiantes/tablaestu');
    }

    function insert()
    {
        //se reciven los datos del formulario de estudiante/index.php
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $anio = $_POST['anio'];
        $direccion = $_POST['direccion'];
        $centroescolar = $_POST['centro_escolar'];
        $seccion = $_POST['seccion'];
        $result=$this->model->insert(['nombre' => $nombre, 'apellidos' => $apellido, 'fecha_nacimiento' => $fecha_nacimiento, 'telefono' => $telefono, 'email' => $email, 'anio' => $anio, 'direccion' => $direccion, 'centro_escolar' => $centroescolar, 'seccion' => $seccion]);
        //return $result;
        echo '<script>
        M.toast({html: "Estudiante agregado con exito", classes: "green rounded white-text"});
        </script>';
    }

    function eliminar($dato = null)
    {
        $id = $dato[0];
        $this->model->eliminar($id);
        header('location:http://localhost/Rop/estudiante/verestudiante');
    }

    /**Esta funcion permite editar los datos de un estudiante */
    function subeditar($param = null)
    {
        $idestudiante = $param[0];
        $estudiante = $this->model->getById($idestudiante);
        $this->view->estudiante = $estudiante;
        $this->view->render('estudiantes/detalle');
    }
    
    /**Esta funcion envia los datos editados a la base de datos
     * Agradecimientos especiales a Roberto porque no comenta su codigo >:v
     */
    function editar()
    {
        $idestudiante = $_POST['idestudiante'];
        $nombre = $_POST['txtNombre'];
        $apellido = $_POST['txtApellido'];
        $fecha_nacimiento = $_POST['fecha'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $anio = $_POST['anio'];
        $direccion = $_POST['direccion'];
        $centroescolar = $_POST['centroescolar'];
        $seccion = $_POST['seccion'];
        $this->model->actualizar(['idestudiante' => $idestudiante, 'nombre' => $nombre, 'apellidos' => $apellido, 'fecha_nacimiento' => $fecha_nacimiento, 'telefono' => $telefono, 'email' => $email, 'anio' => $anio, 'direccion' => $direccion, 'centro_escolar' => $centroescolar, 'seccion' => $seccion]);
        $this->verestudiante();
       
    }

    function perfil($id = null){
        $idestudiante = $id[0];
        $estudiante = $this->model->getById($idestudiante);
        $this->view->estudiante = $estudiante;
        $this->view->render('estudiantes/perfil');
    }

    function recargar()
    {
        $this->view->render('estudiantes/tabla');
    }
}
