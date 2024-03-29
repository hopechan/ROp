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
    <div class="container">
        <div class="row center">
                <a id="a" href="#modal1" class="waves-effect waves-light btn modal-trigger">Nuevo</a>
        </div>
        </div>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 class="center">Editar nota de<br>
                <?php $nombre=$this->nota->nombre." ".$this->nota->apellidos;
                 echo  $nombre?></h4>
                <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL')?>nota/editarNota">
                    <input type="hidden" name="idnota" value="<?php echo $this->nota->idnota; ?>">
                    <div class="row red-text text-accent-4">
                        <div class="input-field col s12">
                            <input type="hidden" name="idestudiante" value="<?php echo $this->nota->idestudiante; ?>">
                            
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">class</i>
                            <select name="idmateria" required>
                                <option value="" disabled selected>Seleccione una materia</option>
                                <?php
                                require_once 'models/materias.php';
                                foreach ($this->materias as $item) {
                                    $materia = new Materias();
                                    $materia = $item;
                                    $b="";
                                    $id=$materia->idmateria;
                                    $materia=$materia->materia;
                                    if($id==$this->nota->idmateria && $materia==$this->nota->materia){
                                        $b="selected";
                                    }
                                    ?>
                                    <option value="<?php echo $id; ?>" <?php echo $b ?>><?php echo $materia; ?></option>
                                <?php } ?>
                            </select>
                            <label>Materia</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">class</i>
                            <input type="number" name="nota_p1" value="<?php echo $this->nota->nota_p1; ?>" class="validate" id="nota_p1" min="0" max="10" step="0.01">
                            <label for="nota_p1">Nota periodo 1</label>
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">class</i>
                            <input type="number" name="nota_p2" value="<?php echo $this->nota->nota_p2; ?>" class="validate" id="nota_p1" min="0" max="10" step="0.01">
                            <label for="nota_p2">Nota periodo 2</label>
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">class</i>
                            <input type="number" name="nota_p3" value="<?php echo $this->nota->nota_p3; ?>" class="validate" id="nota_p3" min="0" max="10" step="0.01">
                            <label for="nota_p3">Nota periodo 3</label>
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">class</i>
                            <input type="number" name="nota_p4" value="<?php echo $this->nota->nota_p4; ?>" class="validate" id="nota_p4" min="0" max="10" step="0.01">
                            <label for="nota_p4">Nota periodo 4</label>
                        </div>
                    </div>
                    <!-- footer del formulario modal -->
                    <div class="center">
                        <button class="modal-close btn boton-save white-text" type="submit">Guardar
                            <i class="material-icons left">send</i>
                        </button>&nbsp;&nbsp;
                        <a href="<?php echo constant('URL'); ?>nota" class="white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <?php require 'views/footer.php' ?>
</body>

</html>
<script type="text/javascript">
//funcion que hace q al cargar la pag este abierto el modal y solo se pueda cerrar con cancelar
    function cargar_pagina() {
        $('.modal').modal({
        dismissible: false, // Modal can be dismissed by clicking outside of the modal
    });
    document.getElementById("a").click();
    }
</script>