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
        $materias = $this->model->get();
        $tipos = $this->model->gettipo();
        $this->view->materias = $materias;
        $this->view->tipos = $tipos;
        $this->view->render("materia/index");
    }

     function agregarMateria()
     {
         $idtipo = $_POST['idtipo'];
         $materia = $_POST['materia'];
         $this->model->insert(['idtipo' => $idtipo, 'materia' => $materia]);
         header('Location:http://localhost/Rop/materia');
    }
     function vermateria($param = null){
         $idmateria = $param[0];
         $materia=$this->model->getById($idmateria);
         $this->view->materia = $materia;
         $tipos = $this->model->gettipo();
         $this->view->tipos = $tipos;
         $this->view->render('materia/detalle');
     }
     
     function editarmateria(){
         $idmateria=$_POST['idmateria'];
         $idtipo=$_POST['idtipo'];
         $materia = $_POST['materia'];
         if($this->model->update(['idmateria' => $idmateria,'idtipo' => $idtipo,'materia' => $materia])){
             $materia = new Materia();
             $materia->idmateria = $idmateria;
             $materia->idtipo    = $idtipo;
             $materia->materia   = $materia;

             $this->view->materia = $materia;
             $this->view->mensaje = "Materia actualizado correctamente";
         }else{
             $this->view->mensaje = "Materia no actualizado";
         }
         header('Location:http://localhost/Rop/materia');
     }

     function eliminarmateria($param = null){
         $idmateria = $param[0];

         if($this->model->delete($idmateria)){
             $this->view->mensaje = "Materia eliminado correctamente";
         }else{
             $this->view->mensaje = "Materia no eliminado ";
         }
         header('Location:http://localhost/Rop/materia');
     }
}
