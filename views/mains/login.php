<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/login.css">
    <title>Oportunidades</title>
</head>
<body>
    <?php require 'views/header.php'?>
    <div class="navbar-fixed">
        <nav class="black">
            <div class="nav-wrapper container red-text text-accent-4">
                <a href="http://www.oportunidades.org.sv/" target="_blank" class="brand-logo right"><img class="img responsive-img" src="<?php echo constant('URL')?>public/img/logo.png" alt="Logo"></a>
            </div>
        </nav>
    </div>
    <div class = "row">
        <div class = "col s12 m12 l12">
            <div class = "card-panel">
                <form>
                    <div class="row">   
                        <div class="col s12 m12 center">
                            <h4>Bienvenido/a</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 input-field">
                            <i class="material-icons prefix grey-text darken-2-text">account_box</i>
                            <input type="text" id="txtUser" name = "txtUser">
                            <label for = "txtUser" class = "black-text">Usuario</label>
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
                            <button class="btn waves-effect waves-light blue" type="submit" name="action">Entrar<i class="material-icons left">send</i></button>
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