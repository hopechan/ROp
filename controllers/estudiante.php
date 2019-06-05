<?php
class Estudiante extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
            
    }
    function render(){
        $this->view->render("estudiantes/index");
    }
    function verEstudiante()
    {
        $this->view->render("estudiantes/verestudiante");
    }
    
}
?>