<?php
class Notas extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
            
    }
    function render(){
        $this->view->render("notas/index");
    }
}
?>