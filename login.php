<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Rop/public/css/login.css">
    <link rel="stylesheet" href="http://localhost/Rop/public/css/style.css">
    <!--<script src="<?php echo constant('URL')?>public/js/usuarios.js" defer></script>-->
    <title>Oportunidades</title>
</head>
<body>
    <div class="navbar-fixed">
        <nav class="black">
            <div class="nav-wrapper container red-text text-accent-4">
                <a href="http://www.oportunidades.org.sv/" target="_blank" class="brand-logo right"><img class="img responsive-img" src="http://localhost/Rop/public/img/logo.png" alt="Logo"></a>
            </div>
        </nav>
    </div>
    <div class = "row">
        <div class = "col s12 m12 l12">
            <div class = "card-panel">
                <form method="post" action = "http://localhost/Rop/login/entrar">
                    <div class="row">
                        <div class="col s12 m12 center">
                            <h4>Bienvenido/a</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 input-field">
                            <i class="material-icons prefix grey-text darken-2-text">account_box</i>
                            <input type="text" id="txtEmail" name = "txtEmail">
                            <label for = "txtEmail" class = "black-text">Correo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 input-field">
                            <i class="material-icons prefix  grey-text darken-2-text">lock_outline</i>
                            <input type="password" id="txtPassword" name = "txtPassword">
                            <label for = "txtPassword" class = "black-text">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m6">
                            <button class="btn waves-effect waves-light blue" type="submit" name="btnLogin" id="btnLogin" >Entrar<i class="material-icons left">send</i></button>
                        </div>
                        <div class="col s6 m6">
                            <button class="waves-effect waves-light btn red">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>