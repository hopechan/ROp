<?php
class Ranking  extends Controller{
    function __construct() {
        parent::__construct(); 
    }

    function render(){
        $this->view->render('ranking/index');
    }
}

?>