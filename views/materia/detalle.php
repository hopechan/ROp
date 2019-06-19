<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body onload="cargar_pagina()">
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <!-- modal trigger 1 -->
        <div class="row">
            <div class="col s12 center">
                <p>Actualizar Materias</p>
                <a id="a" href="#modal1" id="add" class="btn-floating btn-large waves-effect green darken-1 btn modal-trigger"><i class="material-icons">add</i></a>

            </div>
        </div>
        <!-- formulario modal 1 -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 class="center">Actualizar Tipos</h4>
                <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL') ?>materia/editarMateria">
                    <input type="hidden" id="idmateria" name="idmateria" value="<?php echo $this->materia->idmateria; ?>">
                    <div class="row red-text text-accent-4">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">rate_review</i>
                            <select name="idtipo">
                                <?php
                                require_once 'models/tipos.php';
                                foreach ($this->tipos as $item) {
                                    $tipo = new Tipos();
                                    $tipo = $item;

                                    $id=$tipo->idtipo;
                                    $tipo=$tipo->tipo;
                                    $a="";
                                    if($id==$this->materia->idtipo && $tipo==$this->materia->tipo){
                                        $a="selected";
                                    }
                                    ?>
                                    <option value="<?php echo $id ?>" <?php echo $a ?>><?php echo $tipo ?></option>
                                <?php } ?>
                            </select>
                            <label>Id Tipo</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">class</i>
                            <?php
                            $materia = $this->materia->materia;
                            $a="";$b="";$c="";$d="";$e="";$f="";$h="";$i="";
                            switch ($materia) {
                                case 'Matemática':
                                    $a = "selected";
                                    break;
                                case 'Sociales':
                                    $b = "selected";
                                    break;
                                case 'Ciencias':
                                    $c = "selected";
                                    break;
                                case 'Lenguaje y Literatura':
                                    $d = "selected";
                                    break;
                                case 'Computación':
                                    $e = "selected";
                                    break;
                                case 'Ingles':
                                    $f = "selected";
                                    break;;
                                case 'Valores':
                                    $h = "selected";
                                    break;
                                case 'Formación Linguistica':
                                    $i = "selected";
                                    break;
                            }
                            ?>
                            <select name="materia">
                                <option value="" disabled selected>Seleccione la materia</option>
                                <option value="Matemática" <?php echo $a ?>>Matemática</option>
                                <option value="Sociales" <?php echo $b ?>>Sociales</option>
                                <option value="Ciencias" <?php echo $c ?>>Ciencias</option>
                                <option value="Lenguaje y Literatura" <?php echo $d ?>>Lenguaje y Literatura C.E</option>
                                <option value="Computación" <?php echo $e ?>>Computación</option>
                                <option value="Ingles" <?php echo $f ?>>Ingles</option>
                                <option value="Valores" <?php echo $h ?>>Valores</option>
                                <option value="Formación Linguistica" <?php echo $i ?>>Formación Linguistica</option>
                            </select>
                            <label>Materia</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                    </div>
                    <!-- footer del formulario modal -->
                    <div class="center">
                        <button class="modal-close waves-effect waves-green btn boton-save white-text" type="submit">Guardar
                            <i class="material-icons left">send</i>
                        </button>&nbsp;&nbsp;
                        <a href="<?php echo constant('URL'); ?>materia" class=" btn-flat white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
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