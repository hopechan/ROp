<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notas CCGK</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
        <div class="container">
            <div class="row">
                <div id="tabla">
                <div class="col l12 m12 s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>Periodo 1</th>
                                <th>Periodo 2</th>
                                <th>Periodo 3</th>
                                <th>Periodo 4</th>
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once 'models/notas.php';
                                foreach ($this->nota as $item) {
                                $nota = new Notas();
                                $nota = $item;
                            ?>
                            <form id="<?php echo $nota->idestudiante;?>" name="<?php echo $nota->idestudiante;?>">
                                <tr>
                                    <td>
                                        <?php echo $nota->Estudiante; ?>
                                    </td>
                                    <input type="hidden" name="idestudiante" value="<?php echo $nota->idestudiante; ?>" id="idEstudiante">
                                    <input type="hidden" name="idnota" value="<?php echo $nota->idnota; ?>">
                                    <input type="hidden" name="idmateria" value="<?php echo $this->materia; ?>">
                                    <td style="width: 8rem;"><input type="number" class="<?php echo $nota->idestudiante; ?>" name="nota_p1" id="n1"
                                        <?php 
                                            if ($nota->nota_p1<>0) {
                                                echo 'value="'.$nota->nota_p1.'" disabled';
                                            }else{
                                                echo 'value="'.$nota->nota_p1.'"';
                                            }
                                        ?>
                                        steps="0.01" min="0" max="10"
                                        ></td>
                                    <td style="width: 8rem;"><input type="number" class="<?php echo $nota->idestudiante; ?>" name="nota_p2" id="n2"
                                        <?php 
                                            if ($nota->nota_p2<>0) {
                                                echo 'value="'.$nota->nota_p2.'" disabled';
                                            }else{
                                                echo 'value="'.$nota->nota_p2.'"';
                                            }
                                        ?>
                                        steps="0.01" min="0" max="10"
                                        ></td>
                                    <td style="width: 8rem;"><input type="number" class="<?php echo $nota->idestudiante; ?>" name="nota_p3" id="n3"
                                        <?php 
                                            if ($nota->nota_p3<>0) {
                                                echo 'value="'.$nota->nota_p3.'" disabled';
                                            }else{
                                                echo 'value="'.$nota->nota_p3.'"';
                                            }
                                        ?>
                                        steps="0.01" min="0" max="10"
                                        ></td>
                                    <td style="width: 8rem;"><input type="number" class="<?php echo $nota->idestudiante; ?>" name="nota_p4" id="n4"
                                        <?php 
                                            if ($nota->nota_p4<>0) {
                                                echo 'value="'.$nota->nota_p4.'" disabled';
                                            }else{
                                                echo 'value="'.$nota->nota_p4.'"';
                                            }
                                            
                                        ?>
                                        steps="0.01" min="0" max="10"
                                    ></td>
                                    <td class="center">
                                        <button type="submit" class="btn-floating btn waves-effect waves-light green guardar" id="boton" value="<?php echo $nota->idestudiante; ?>" name="<?php echo $nota->idestudiante; ?>"><i class="material-icons">save</i></button>
                                        <a class="btn-floating btn waves-effect waves-light blue editar" id="<?php echo $nota->idestudiante; ?>"><i class="material-icons">edit</i></a>
                                    </td>
                                </tr>
                            </form>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="algo">
                
            </div>
        </div>
    <?php require 'views/footer.php' ?>
</body>
</html>
<script src="<?php echo constant('URL')?>public/js/nccgk.js"></script>