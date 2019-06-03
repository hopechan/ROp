<?php
class Tipo extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
            $this->view->render("tipo/index");
    }
}
?>