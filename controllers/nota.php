<?php
require_once "models/notas.php";
class Nota extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->notas = [];
    }
//funcion que renderiza la vista de notas segun año
//es el reemplazo de la funcion neonotas
    function nccgk($num=null){
        $anio=$num[0];
        $actual = date('Y');
        $year = ($actual - $anio);
        $materia = $num[1];
        $datos = ['year'=>$year, 'materia'=>$materia];
        $nota = $this->model->get($datos);
        //$estudiante = $this->model->getEstudiante($year);
        $this->view->materia = $materia;
        $this->view->nota = $nota;
        $this->view->render('notas/tablaccgk');
    }

    function render(){
            $materia = $this->model->getMateria();
            $this->view->materia = $materia;
            $this->view->render("notas/index");
    }

    //Cambios en la funcion agregarNota revie los datos via fetch para mandarlos al modelo
    function agregarNota(){
        $idestudiante = $_POST['idestudiante'];
        $idmateria = $_POST['idmateria'];
        // aun falta integrar el idmateria
        //$idmateria = $_POST['idmateria'];
        $nota_p1 = $_POST['nota_p1'];
        $nota_p2 = $_POST['nota_p2'];
        $nota_p3 = $_POST['nota_p3'];
        $nota_p4 = $_POST['nota_p4'];
        $resultado = $this->model->insert(['idmateria'=> $idmateria,'idestudiante'=>$idestudiante, 'nota_p1'=>$nota_p1, 'nota_p2'=>$nota_p2, 'nota_p3'=>$nota_p3, 'nota_p4'=>$nota_p4]);
        //header('Location:http://localhost/Rop/nota');
        if ($resultado == true) {
             $resultado = "si";
        }else{
            $resultado = "no";
        }
        echo $resultado;
    }
    //------------------------------------------------------------------------------------

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
            
            echo 'si';
        }else{
            echo 'no';
        }
        //header('Location:http://localhost/Rop/nota');
    }

    function CCGK(){
        $notasCCGK = $this->model->getNotasByTipo(1, 2018);
        $promCCGK  = $this->model->promedios($notasCCGK, 5);
        echo json_encode($promCCGK);
    }

    function listaFinal(){
        $notasCCGK = $this->model->getNotasByTipo(1, $this->model->obtenerAnio(2));
        $promCCGK  = $this->model->promedios($notasCCGK, 5);
        $notasCE   = $this->model->getNotasByTipo(2, $this->model->obtenerAnio(2));
        $promCE    = $this->model->promedios($notasCE, 4);
        $lista     = $this->model->listaFinal($promCCGK, $promCE);
        echo json_encode($lista);
    }

    
}
?>