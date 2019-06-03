<?php
class Estudiantes extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
            $this->view->render("estudiantes/index");
    }
}
?>