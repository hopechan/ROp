<?php
    require_once "controllers/errores.php";
    require_once "controllers/login.php";
    class App{
        function __construct() {
            //$url = $_GET['url'];
            $url = isset($_GET['url'])?$_GET['url']:null;
            $url = rtrim($url, "/");
            $url = explode("/", $url);
            //si existe una sesion continua con las validaciones que ya se habian realizado sino redirige a login/index
            if (session_status() === PHP_SESSION_NONE || session_status() === PHP_SESSION_DISABLED) {
                $controller = new Login();
            }else {
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
                    if($npram > 1){
                        if($npram > 2){
                            $param = [];
                            for($i =2; $i<$npram; $i++){
                                array_push($param, $url[$i]);
                            }
                            $controller->{$url[1]}($param);
                        }else{
                            $controller->{$url[1]}();
                        }
                    }else{
                        $controller->render();
                    }
                }else {
                    $controller = new Errores();
                }
            }
        }
    }
?>