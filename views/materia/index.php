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
                <a href="#modal1" id="add" class="btn-floating btn-large waves-effect btn modal-trigger boton-save"><i class="material-icons">add</i></a>
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
                            <select name="idtipo" id="idtipo" required>
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
                    <!-- footer del formulario modal -->
                    <div class="modal-footer">
                        <div class="center-align">
                        <button class="btn boton-save white-text" type="submit" id="btn">Guardar
                            <i class="material-icons left">send</i>
                        </button>&nbsp;&nbsp;
                        <a class="modal-close white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <!--Tabla de la vista de materia-->
        <table id="tabla" class="centered highlight responsive-table">
            <thead class="black white-text">
                <tr>
                    <th hidden>Id materia</th>
                    <th>Materia</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-id">
                
                    <?php
                    require_once 'models/materias.php';
                    foreach ($this->materias['registros'] as $item) {
                        $materia = new Materias();
                        $materia = $item;
                        ?>
                        <tr id="fila-<?php echo $materia->idmateria; ?>">
                        <td hidden><?php echo $materia->idmateria; ?></td>
                        <td><?php echo $materia->materia; ?></td>
                        <td><?php echo $materia->tipo; ?></td>
                        <!--botones-->
                        <td><a href="<?php echo constant('URL') . 'materia/verMateria/' . $materia->idmateria; ?>" class="btn-floating btn-medium waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></button></a>
                        <button class="btn-floating btn-medium waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="<?php echo $materia->idmateria; ?>"><i class="material-icons">delete</i></button></td>
                        <!-- <td><a href="<?php echo constant('URL') . 'materia/eliminarMateria/'  ?>" class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn"></a></td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--Paginacion-->
        <div class="row">
            <div class="col l12 m12 s12">
            <ul class="pagination center">
                    <li class="disabled"><a href=""><i class="material-icons">chevron_left</i></a></li>
                    <?php 
                        for ($i=0; $i < $this->materias['numero'] ; $i++) { 
                            $activa = "";
                            if (isset($_GET['pagina'])) {  
                                $pagina_activa = $_GET['pagina'];
                                if ($pagina_activa == ($i+1)) {
                                $activa = "active black";
                            }
                            }else{
                            $pagina_activa = 1;
                            if ($pagina_activa == ($i+1)) {
                                $activa = "active black";
                            }
                            
                        }
                            echo "<li class='waves-effect ".$activa."' name='".($i+1)."'><a href='" . constant('URL')."materia?pagina=".($i+1)."'>". ($i+1) ."</a></li>";
                        }
                    ?>
                    <li class="disabled"><a href=""><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL');?>public/js/materia.js"></script>
    <?php require 'views/footer.php' ?>
</body>

</html>