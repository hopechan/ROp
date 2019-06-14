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
                        <div class="input-field col s6">
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
                        <div class="input-field col s6">
                            <i class="material-icons prefix">class</i>
                            <input type="number" name="nota" value="<?php echo $this->nota->nota; ?>" class="validate" id="nota" min="0" max="10" step="0.01">
                            <label for="nota">Nota</label>
                        </div>
                    </div>
                    <!-- footer del formulario modal -->
                    <div class="center">
                        <button class="modal-close waves-effect waves-green btn green white-text" type="submit">Enviar
                            <i class="material-icons left">send</i>
                        </button>&nbsp;&nbsp;
                        <a href="<?php echo constant('URL'); ?>nota" class="waves-effect waves-red btn-flat white-text red accent-4 btn">Cancelar <i class="material-icons left">close</i></a>
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