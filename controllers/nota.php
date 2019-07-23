<?php
require_once "models/notas.php";
class Nota extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->notas = [];
    }
//para agregar todas las notas de un alumno
    function neonotas($id = null){
        $idestudiante = $id[0];
        $nota = $this->model->getById($idestudiante);
        $materias = $this->model->getMateria();
        $this->view->materias = $materias;
        $this->view->nota = $nota;
        $this->view->render('notas/neonotas');
    }

    function render(){
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
        $nota_p1 = $_POST['nota_p1'];
        $nota_p2 = $_POST['nota_p2'];
        $nota_p3 = $_POST['nota_p3'];
        $nota_p4 = $_POST['nota_p4'];
        $this->model->insert(['idmateria'=> $idmateria,'idestudiante'=>$idestudiante, 'nota_p1'=>$nota_p1, 'nota_p2'=>$nota_p2, 'nota_p3'=>$nota_p3, 'nota_p4'=>$nota_p4]);
        header('Location:http://localhost/Rop/nota');
    }

    function filtrar(){
        $filtro = $_POST['filtro'];
        $resultado = $this->model->buscar($filtro);
        $item = json_encode($resultado, JSON_PRETTY_PRINT);
        echo $item;
    }

    function eliminarNota($param = null){
        $idNota= $param[0];
        if($this->model->delete($idNota)){
            $mensaje = "si";
        }else{
            $mensaje = "no";
        }
        echo $mensaje;
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
        $idestudiante = $_POST['idestudiante'];
        $idmateria = $_POST['idmateria'];
        $nota_p1 = $_POST['nota_p1'];
        $nota_p2 = $_POST['nota_p2'];
        $nota_p3 = $_POST['nota_p3'];
        $nota_p4 = $_POST['nota_p4'];

        if($this->model->update(['idnota' => $idnota, 'idestudiante' => $idestudiante, 'idmateria' => $idmateria, 'nota_p1'=>$nota_p1, 'nota_p2'=>$nota_p2, 'nota_p3'=>$nota_p3, 'nota_p4'=>$nota_p4])){
            $nota = new Notas();
            $nota->idnota = $idnota;
            $nota->nota_p1 = $nota_p1;
            $nota->nota_p2 = $nota_p2;
            $nota->nota_p3 = $nota_p3;
            $nota->nota_p4 = $nota_p4;
            $nota->idestudiante = $idestudiante;
            $nota->idmateria = $idmateria;
            
            $this->view->nota = $nota;
            $this->view->mensaje = "Nota actualizado correctamente";
        }else{
            $this->view->mensaje = "Nota no actualizado ";
        }
        header('Location:http://localhost/Rop/nota');
    }

    function CCGK(){
        $notasCCGK = $this->model->getNotasByTipo(1);
        $promCCGK  = $this->model->promedios($notasCCGK, 5);
        echo json_encode($promCCGK);
    }
    
    function listaFinal(){
        $notasCCGK = $this->model->getNotasByTipo(1);
        $promCCGK  = $this->model->promedios($notasCCGK, 5);
        $notasCE   = $this->model->getNotasByTipo(2);
        $promCE    = $this->model->promedios($notasCE, 4);
        $lista     = $this->model->listaFinal($promCCGK, $promCE);
        echo json_encode($lista);
    }
}
?>