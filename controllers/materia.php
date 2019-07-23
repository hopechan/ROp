<?php
class Materia extends Controller
{
    function __construct()
    {
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->materias = [];
    }

    function render()
    {
        $tipos = $this->model->gettipo();
        $this->view->tipos = $tipos;
        $this->view->render("materia/index");
    }
    function form()
    {
        $tipos = $this->model->gettipo();
        $this->view->tipos = $tipos;
        $this->view->render("materia/form");
    }
    function tabla()
    {
        $materias = $this->model->get();
        $this->view->materias = $materias;
        $this->view->render("materia/tabla");
    }

    function agregarMateria()
    {
        $idtipo = $_POST['idtipo'];
        $materia = $_POST['materia'];
        $result=$this->model->insert(['idtipo' => $idtipo, 'materia' => $materia]);
        if ($result) {
            $mensaje = "si";
        } else {
            $mensaje = "no";
        }
        echo $mensaje;
    }
    function verMateria($param = null)
    {
        $idmateria = $param[0];
        $materia = $this->model->getById($idmateria);
        $this->view->materia = $materia;
        $tipos = $this->model->gettipo();
        $this->view->tipos = $tipos;
        $this->view->render('materia/detalle');
    }

    function editarMateria()
    {
        $idmateria = $_POST['idmateria'];
        $idtipo = $_POST['idtipo'];
        $materia = $_POST['materia'];
        if ($this->model->update(['idmateria' => $idmateria, 'idtipo' => $idtipo, 'materia' => $materia])) {
            $materia = new Materia();
            $materia->idmateria = $idmateria;
            $materia->idtipo    = $idtipo;
            $materia->materia   = $materia;

            $this->view->materia = $materia;
            $this->view->mensaje = "Materia actualizado correctamente";
        } else {
            $this->view->mensaje = "Materia no actualizado";
        }
        header('Location:http://localhost/Rop/materia');
    }

    function eliminarMateria($param = null)
    {
        $idmateria = $param[0];

        if ($this->model->delete($idmateria)) {
            $mensaje = "si";
        } else {
            $mensaje = "no";
        }
        echo $mensaje;
    }
}
