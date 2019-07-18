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

    //prueba para colocar un toast aqui
    function verindex()
    {
        $this->view->render("estudiantes/index");
        $mensaje = "<script>
                        M.toast({ html: 'Alumno agregado con éxito', classes: 'green rounded white-text'});
                    </script>";
        $this->view->mensaje = $mensaje;
    }

    function reportes()
    {
        $this->view->render("estudiantes/reportes");
    }
    function reportealumnos()
    {
        $estudiantes = $this->model->getEstudiantes(1);
        $this->view->estudiantes = $estudiantes;
        $this->view->render("estudiantes/reportesalumno");
    }
    function reportecxalumno($id = null)
    {
        $idestudiante = $id[0];
        $estudiante = $this->model->getNotasByTipoEstudiante(1, $idestudiante);
        $estudiante2 = $this->model->getNotasByTipoEstudiante(2, $idestudiante);
        $estudiante3 = $this->model->getNotasByTipoEstudiante(6, $idestudiante);
        $this->view->estudiante = $estudiante;
        $this->view->estudiante2 = $estudiante2;
        $this->view->estudiante3 = $estudiante3; 
        $estudiante4 = $this->model->getById($idestudiante);
        $this->view->estudiante4 = $estudiante4;
        $this->view->render('estudiantes/report');
    }
    function reportepromo()
    {
        $this->view->render("estudiantes/reportespromo");
    }


    function ver()
    {
        $estudiantes = $this->model->get();
        $this->view->estudiantes = $estudiantes;
        $this->view->render('estudiantes/mostrar');
    }

    function insert()
    {
        //se reciben los datos del formulario de estudiante/index.php
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $anio = $_POST['anio'];
        $direccion = $_POST['direccion'];
        $centroescolar = $_POST['centro_escolar'];
        $seccion = $_POST['seccion'];
        $this->model->insert(['nombre' => $nombre, 'apellidos' => $apellido, 'fecha_nacimiento' => $fecha_nacimiento, 'telefono' => $telefono, 'email' => $email, 'anio' => $anio, 'direccion' => $direccion, 'centro_escolar' => $centroescolar, 'seccion' => $seccion]);
        header("Location:" . constant('URL') . "estudiante/");
        //$this->verindex();
    }

    function eliminar($dato = null)
    {
        $id = $dato[0];
        $this->model->eliminar($id);
        header('location:http://localhost/Rop/estudiante/ver');
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

    function perfil($id = null)
    {
        $idestudiante = $id[0];
        $estudiante = $this->model->getById($idestudiante);
        $this->view->estudiante = $estudiante;
        $this->view->render('estudiantes/perfil');
    }
}
