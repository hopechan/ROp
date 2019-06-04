<?php
    require_once "controllers/errores.php";
    class App{
         function __construct() {
            //$url = $_GET['url'];
            $url = isset($_GET['url'])?$_GET['url']:null;
            $url = rtrim($url, "/");
            $url = explode("/", $url);

            //cuando se ingresa sin definir controlador
            if (empty($url[0])) {
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }
            $archivoController = 'controllers/'.$url[0].'.php';

            if (file_exists($archivoController)){
                require_once $archivoController;

                //inicializa el controlador
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                //numero de elementos de el arreglo
                $npram =sizeof($url);

                //si ha un metodo que se requiere cargar
                if (isset($url[1])){
                    $controller->{$url[1]}();
                }else{
                    $controller->render();
                }
            } else {
                $controller = new Errores();
            }
            
        }   
    }
?>