<?php
include_once "controllers/nota.php";
class Ranking extends Controller{
    function __construct() {
        parent::__construct(); 
    }

    function render(){
        $n = new NotaModel();
        $ranking = $n->listaFinal($n->promedios($n->getNotasByTipo(1), 5), $n->promedios($n->getNotasByTipo(2), 4));
        $this->view->ranking = $ranking;
        $this->view->render('ranking/index');
    }
}

?>