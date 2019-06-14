<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
    <!-- modal trigger 1 -->
    <div class="row">
        <div class="col s12 center">
            <p>Agregar Tipo</p>
            <a href="#modal1" id="add" class="btn-floating btn-large waves-effect boton-save btn modal-trigger"><i class="material-icons">add</i></a>
        
        </div>
    </div>
    <!-- formulario modal 1 -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4 class="center">Nuevo Tipo</h4>
            <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL');?>tipo/agregarTipo">
                <input type="hidden" id="idtipo">
                <div class="row red-text text-accent-4">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">rate_review</i>
                        <input type="text" name="tipo" id="Tipo" class="validate" required>
                        <label for="Tipo">Tipo</label>
                        <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                    </div>
                </div>
                <div class="row red-text text-accent-4">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <input type="text" name="descripcion" id="Descripcion" class="validate" data-length="120" required>
                        <label for="Descripcion">Descripción</label>
                        <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                    </div>
                </div>
                <!-- footer del formulario modal -->
                <div class="center">
                    <button class="modal-close btn boton-save white-text" type="submit">Enviar
                        <i class="material-icons left">send</i>
                    </button>&nbsp;&nbsp;
                    <a class="modal-close btn-flat white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col s12 m12 l12">
    <table id="tabla" class="centered highlight responsive-table">
        <thead class="black white-text">
            <tr>
                <th hidden>Id tipo</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead> 
        <tbody id="tbody-id">
        <?php 
            require_once 'models/tipos.php';
            foreach($this->tipos as $item){
                $tipo =new Tipos();
                $tipo = $item;

            ?>
            <tr id="fila-<?php echo $tipo->idtipo; ?>">
                <td hidden><?php echo $tipo->idtipo; ?></td>
                <td><?php echo $tipo->tipo; ?></td>
                <td><?php echo $tipo->descripcion; ?></td>
                <td><a href="<?php echo constant('URL') . 'tipo/verTipo/' . $tipo->idtipo;?>" class="right btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></a></td>
                <td><button class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="<?php echo $tipo->idtipo; ?>"><i class="material-icons">delete</i></button></td>
                <!-- <td><a href="<?php echo constant('URL').'tipo/eliminarTipo/'. $tipo->idtipo;?>" class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn"><i class="material-icons">delete</i></a></td> -->
            </tr>
            <?php } ?>
        </tbody>  
    </table>
    </div>
    </div>
</div>
<script src="<?php echo constant('URL');?>public/js/tipo.js"></script>
    <?php require 'views/footer.php' ?>
</body>
</html>