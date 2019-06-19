<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Materias</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <!-- modal trigger 1 -->
        <div class="row tamaño">
            <div class="col s12 center"><br><br>
                <p>Agregar Materia</p>
                <a href="#modal1" id="add" class="btn-floating btn-large waves-effect green darken-1 btn modal-trigger"><i class="material-icons">add</i></a>
            </div>
        </div>
        <!-- formulario modal 1 -->
        <div id="modal1" class="modal tamaño">
            <div class="modal-content">
                <h4 class="center">Nuevo Materia</h4>
                <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL'); ?>materia/agregarMateria">
                    <input type="hidden" id="idmateria">
                    <div class="row red-text text-accent-4">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">rate_review</i>
                            <select name="idtipo" required>
                                <option value="" disabled selected>Seleccione el IdTipo</option>
                                <?php
                                require_once 'models/tipos.php';
                                foreach($this->tipos as $item){
                                    $tipo =new Tipos();
                                    $tipo = $item;
                                    ?>
                                    <option value="<?php echo $tipo->idtipo; ?>"><?php echo $tipo->tipo; ?></option>
                                <?php } ?>
                            </select>
                            <label>Id Tipo</label>
                            <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                        </div>
                        <div class="input-field col s12" >
                            <i class="material-icons prefix">class</i>
                            <select name="materia" required>
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
                    <!-- footer del formulario modal -->
                    <div class="center">
                        <button class="modal-close btn boton-save white-text" type="submit">Enviar
                            <i class="material-icons left">send</i>
                        </button>&nbsp;&nbsp;
                        <a class="modal-close white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <table id="tabla" class="centered highlight responsive-table">
            <thead class="black white-text">
                <tr>
                    <th hidden>Id materia</th>
                    <th>Tipo</th>
                    <th>Materia</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-id">
                
                    <?php
                    require_once 'models/materias.php';
                    foreach ($this->materias as $item) {
                        $materia = new Materias();
                        $materia = $item;
                        ?>
                        <tr id="fila-<?php echo $materia->idmateria; ?>">
                        <td hidden><?php echo $materia->idmateria; ?></td>
                        <td><?php echo $materia->materia; ?></td>
                        <td><?php echo $materia->tipo; ?></td>
                        <td><a href="<?php echo constant('URL') . 'materia/verMateria/' . $materia->idmateria; ?>" class="right btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></button></a></td>
                        <td><button class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="<?php echo $materia->idmateria; ?>"><i class="material-icons">delete</i></button></td>
                        <!-- <td><a href="<?php echo constant('URL') . 'materia/eliminarMateria/'  ?>" class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn"></a></td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="<?php echo constant('URL');?>public/js/materia.js"></script>
    <?php require 'views/footer.php' ?>
</body>

</html>