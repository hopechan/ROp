<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo constant('URL')?>public/css/vanilla-dataTables.css" rel="stylesheet" type="text/css">
    <script src="<?php echo constant('URL')?>public/js/libs/vanilla-dataTables.js" type="text/javascript"></script>
    <script src="<?php echo constant('URL')?>public/js/libs/validate.min.js" type="text/javascript"></script>
    <script src="<?php echo constant('URL')?>public/js/usuarios.js" defer type="text/javascript"></script>
    <title>Usuarios</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <br>
            <h4 class ="center">Nuevo Usuario</h4>
            <form action="<?php echo constant('URL'); ?>usuario/agregarUsuario" method="post">
                <div class="row">
                    <div class="col s6 m6 input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="txtNombre" name="txtNombre" type="text" class="validate">
                        <label for="txtNombre">Nombre</label>
                    </div>
                    <div class="col s6 m6 input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="txtApellido" name="txtApellido" type="text" class="validate">
                        <label for="txtApellido">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 input-field">
                        <i class="material-icons prefix">email</i>
                        <input id="txtEmail" name="txtEmail" type="email" class="validate">
                        <label for="txtEmail">email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6 input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="txtContra1" name="txtContra1" type="password" class="validate">
                        <label for="txtContra1">Contraseña</label>
                    </div>
                    <div class="col s6 m6 input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="txtContra2" name="txtContra2" type="password" class="validate">
                        <label for="txtContra2">Vuelva a escribir la contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6">
                        <p>
                            <label>
                                <input class="with-gap" name="rTipo" type="radio" value = "A" checked />
                                <span>Administrador</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s6 m6">
                        <p>
                            <label>
                                <input class="with-gap" name="rTipo" type="radio" value = "I" />
                                <span>Invitado</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="center-align">
                    <button class="btn boton-save white-text" type="submit" id="ok">Guardar
                        <i class="material-icons left">send</i>
                    </button>&nbsp;&nbsp;
                    <a class="modal-close white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <h3>Usuarios</h3>
        <div class="row">
            <div class="col offset-s9 offset-m9"><a class="boton-g btn modal-trigger" href="#modal1">Nuevo</a></div>
        </div>
        <table id = "tblUsuarios">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Rol</td>
                    <td>Acciones</td>                
                </tr>
            </thead>
            <tbody>
            <?php
            include_once 'models/usuarios.php';
            foreach ($this->usuarios as $u) {
                $user = new Usuarios();
                $user = $u;
            ?>
            <input type="hidden" id="idnota" value="<?php echo $u->idusuario; ?>">
            <tr id="fila-<?php echo $u->idusuario; ?>">
                <td><?php echo $u->nombre .' '.$u->apellido; ?></td>
                <td><?php echo $u->email; ?></td>
                <td><?php echo $u->rol ?></td>
                <td>
                    <!--botones de la tabla de vista notas-->
                    <a href="#" class="btn-floating btn grey darken-3 waves-effect"><i class="material-icons">account_circle</i></a>
                    <a href="<?php echo constant('URL') . 'usuario/detalle/' . $u->idusuario; ?>" class="btn-floating btn-medium waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></a>
                    <a class="btn-floating btn-medium waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="<?php echo $u->idusuario; ?>"><i class="material-icons">delete</i></a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>