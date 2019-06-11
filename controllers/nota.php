<?php
class Nota extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->notas = [];
    }

    function render(){
        //mando diferentes variables del mismo metodo para separar
        $notas = $this->model->get();
        $materias = $this->model->getMateria();
        $estudiantes = $this->model->getEstudiante();
        $this->view->notas = $notas;
        $this->view->materias = $materias;
        $this->view->estudiantes = $estudiantes;
        $this->view->render("notas/index");
    }

    function agregarNota(){
        $idestudiante = $_POST['idestudiante'];
        $idmateria = $_POST['idmateria'];
        $nota = $_POST['nota'];
        $this->model->insert(['idmateria'=> $idmateria,'idestudiante'=>$idestudiante, 'nota'=>$nota]);
        header('Location:http://localhost/Rop/nota');
    }

    function filtrar(){
        $filtro = $_POST['filtro'];
        $resultado = $this->model->buscar($filtro);
        return json_encode($resultado);
    }

    function eliminarNota($param = null){
        $idNota= $param[0];

        if($this->model->delete($idNota)){
            $this->view->mensaje = "Tipo eliminado correctamente";
        }else{
            $this->view->mensaje = "Tipo no eliminado ";
        }
        header('Location:http://localhost/Rop/nota');
    }
    
    function verNota($param = null){
        $idNota = $param[0];
        $nota = $this->model->getById($idNota);
        $materias = $this->model->getMateria();
        $this->view->materias = $materias;
        $estudiantes = $this->model->getEstudiante();
        $this->view->estudiantes = $estudiantes;
        $this->view->nota = $nota;
        $this->view->render('notas/detalle');
    }

    function editarNota(){
        $idnota = $_POST['idnota'];
        $nota = $_POST['nota'];
        $idestudiante = $_POST['idestudiante'];
        $idmateria = $_POST['idmateria'];

        if($this->model->update(['idnota' => $idnota, 'nota' => $nota, 'idestudiante' => $idestudiante, 'idmateria' => $idmateria])){
            $nota = new Notas();
            $nota->idnota = $idnota;
            $nota->nota = $nota;
            $nota->idestudiante = $idestudiante;
            $nota->idmateria = $idmateria;
            
            $this->view->nota = $nota;
            $this->view->mensaje = "Nota actualizado correctamente";
        }else{
            $this->view->mensaje = "Nota no actualizado ";
        }
        header('Location:http://localhost/Rop/nota');
    }
}
?>