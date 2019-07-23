<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Materias</title>
    <link href="<?php echo constant('URL') ?>public/css/vanilla-dataTables.css" rel="stylesheet" type="text/css">
    <script src="<?php echo constant('URL') ?>public/js/libs/vanilla-dataTables.js" type="text/javascript"></script>
</head>
<style>
 .modal { width: 75% !important ; max-height: 100% !important ; overflow-y: hidden !important ;} /* increase the width, height and prevent vertical scroll! However, i don't recommend this, its better to turn on vertical scrolling. */ 
 </style>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <!-- modal trigger 1 -->
        <div class="row tamaño">
            <div class="col s12 center"><br><br>
                <p>Agregar Materia</p>
                <a href="#modal1" id="add" class="btn-floating btn-large waves-effect btn modal-trigger boton-save"><i class="material-icons">add</i></a>
            </div>
        </div>
        <div id="frm">
        <!-- formulario modal 1 -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL'); ?>materia/agregarMateria">
                <h4 class="center">Nueva Materia</h4>
                    <input type="hidden" id="idmateria">
                    <div class="row red-text text-accent-4">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">rate_review</i>
                            <select name="idtipo" id="idtipo" required>
                                <option value="" disabled selected>Seleccione el IdTipo</option>
                                <?php
                                require_once 'models/tipos.php';
                                foreach ($this->tipos as $item) {
                                    $tipo = new Tipos();
                                    $tipo = $item;
                                    ?>
                                    <option value="<?php echo $tipo->idtipo; ?>"><?php echo $tipo->tipo; ?></option>
                                <?php } ?>
                            </select>
                            <label>Id Tipo</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">class</i>
                            <select name="materia" id="materia" required>
                                <option value="" disabled selected>Seleccione la materia</option>
                                <option value="Matemática">Matemática</option>
                                <option value="Sociales">Sociales</option>
                                <option value="Ciencias">Ciencias</option>
                                <option value="Lenguaje y Literatura">Lenguaje y Literatura</option>
                                <option value="Computación">Computación</option>
                                <option value="Ingles">Ingles</option>
                                <option value="Valores">Valores</option>
                                <option value="Formación Linguistica">Formación Linguistica</option>
                            </select>
                            <label>Materia</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                    </div>
            </div>
            <!-- footer del formulario modal -->
            <div class="modal-footer">
                <div class="center-align">
                    <button class="btn boton-save white-text modal-close" type="submit" id="btn">Guardar
                        <i class="material-icons left">send</i>
                    </button>&nbsp;&nbsp;
                    <a class="modal-close white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                </div>
            </div>
            <!-- fin del footer del modal 1 -->
            </form>
        </div>
        </div>
        <div id="cuerpo"></div>
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/materia.js"></script>
    <?php require 'views/footer.php' ?>
</body>

</html>