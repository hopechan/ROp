<?php
class Notas extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
            $this->view->render("notas/index");
    }
}
?>