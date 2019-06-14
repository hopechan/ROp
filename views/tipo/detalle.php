<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="cargar_pagina()">
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <!-- modal trigger 1 -->
        <div class="row">
            <div class="col s12 center">
                <p>Actualizar Tipo</p>
                <a id="a" href="#modal1" id="add" class="btn-floating btn-large waves-effect black darken-1 btn modal-trigger"><i class="material-icons">add</i></a>

            </div>
        </div>
        <!-- formulario modal 1 -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 class="center">Actualizar Tipos</h4>
                <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL'); ?>tipo/editarTipo">
                    <input type="hidden" name="idtipo" value="<?php echo $this->tipo->idtipo; ?>">
                    <div class="row red-text text-accent-4">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">rate_review</i>
                            <input type="text" name="tipo" class="validate" value="<?php echo $this->tipo->tipo; ?>" required>
                            <label for="Tipo">Tipo</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                    </div>
                    <div class="row red-text text-accent-4">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <input type="text" name="descripcion" class="validate" data-length="120" value="<?php echo $this->tipo->descripcion; ?>" required>
                            <label for="Descripcion">Descripción</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                    </div>
                    <!-- footer del formulario modal -->
                    <div class="center">
                        <button class="modal-close boton-save white-text" type="submit">Actualizar
                            <i class="material-icons left">send</i>
                        </button>&nbsp;&nbsp;
                        <a href="<?php echo constant('URL'); ?>tipo" class="white-text boton-delete">Cancelar <i class="material-icons left">close</i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>

</html>
<script type="text/javascript">
    function cargar_pagina() {
        $('.modal').modal({
        dismissible: false, // Modal can be dismissed by clicking outside of the modal
    });
    document.getElementById("a").click();
    }
</script>