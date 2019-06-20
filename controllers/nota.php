<?php
class Nota extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->notas = [];
    }

    function render(){
        //mando diferentes variables del mismo metodo para separar
        if (isset($_GET['pagina'])) {
            $pag = $_GET['pagina'];
            $notas = $this->model->get($pag);
            $materias = $this->model->getMateria();
            $estudiantes = $this->model->getEstudiante();
            $this->view->notas = $notas;
            $this->view->materias = $materias;
            $this->view->estudiantes = $estudiantes;
            $this->view->render("notas/index");
        }else {
            $pag = 1;
            $notas = $this->model->get($pag);
            $materias = $this->model->getMateria();
            $estudiantes = $this->model->getEstudiante();
            $this->view->notas = $notas;
            $this->view->materias = $materias;
            $this->view->estudiantes = $estudiantes;
            $this->view->render("notas/index");
        }
        
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
        $notas = $this->model->getNotasByTipo(1);
        echo json_encode($notas, JSON_PRETTY_PRINT);
    }

    function CE(){
        $notas = $this->model->getNotasByTipo(2);
        echo json_encode($notas, JSON_PRETTY_PRINT);
    }

    function certificaciones(){
        $notas = $this->model->getNotasByTipo(3);
        echo json_encode($notas, JSON_PRETTY_PRINT);
    }
}
?>