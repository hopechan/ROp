<?php
class Estudiantes extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
            
    }
    function render(){
        $this->view->render("estudiantes/index");
    }
    
}
?>