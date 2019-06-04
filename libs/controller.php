<?php
/**
 * Clase padre para los controladores
 */
    class Controller{
        function __construct() {
            //crear vistas que pertenezcan al controlador invocado
            $this->view = new View(); //variable privada
        }
    function loadModel($model){
        $url= 'models/'.$model.'model.php';

        if(file_exists($url)){
            require $url;
            
            $modelName = $model.'Model';
            $this->model = new $modelName;
        }
    }
   } 
?>