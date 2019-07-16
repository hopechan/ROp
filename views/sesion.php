<?php
    //Revisa si existe una sesion activa sino existe redirige a login.php
    if (session_status() === PHP_SESSION_NONE || session_status() === PHP_SESSION_DISABLED) {
        //header("Location: http://localhost/Rop/");
    }
?>