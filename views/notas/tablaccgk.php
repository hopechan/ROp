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
                            <form id="<?php echo $nota->idestudiante;?>">
                            <tr>
                                <td>
                                    <?php 
                                        if ($nota->Estudiante) {
                                            echo $nota->Estudiante;
                                        }else{
                                            echo $estudiante->Estudiantes;
                                        }
                                    ?>
                                </td>
                                <input type="hidden" name="idestudiante" value="<?php echo $nota->idestudiante; ?>" id="idEstudiante">
                                <input type="radio" name="idmateria" value="1" id="idmateria">
                                <td style="width: 8rem;"><input type="number" name="nota_p1" id="n1"
                                    <?php 
                                        if ($nota->nota_p1) {
                                            echo 'value="'.$nota->nota_p1.'" disabled';
                                        }
                                    ?>
                                    ></td>
                                <td style="width: 8rem;"><input type="number" name="nota_p2" id="n2"
                                    <?php 
                                        if ($nota->nota_p2) {
                                            echo 'value="'.$nota->nota_p2.'" disabled';
                                        }
                                    ?>
                                    ></td>
                                <td style="width: 8rem;"><input type="number" name="nota_p3" id="n3"
                                    <?php 
                                        if ($nota->nota_p3) {
                                            echo 'value="'.$nota->nota_p3.'" disabled';
                                        }
                                    ?>
                                    ></td>
                                <td style="width: 8rem;"><input type="number" name="nota_p4" id="n4"
                                    <?php 
                                        if ($nota->nota_p4) {
                                            echo 'value="'.$nota->nota_p4.'" disabled';
                                        }
                                    ?>
                                    ></td>
                                <td class="center">
                                <button type="submit" class="btn-floating btn waves-effect waves-light green guardar" id="boton" value="<?php echo $estudiante->idEstudiante; ?>"><i class="material-icons">save</i></button>
                                <a class="btn-floating btn waves-effect waves-light blue"><i class="material-icons">edit</i></a>
                                </td>
                            </tr>
                            </form>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>