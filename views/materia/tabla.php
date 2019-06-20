<?php
                    require_once 'models/materias.php';
                    foreach ($this->materias['registros'] as $item) {
                        $materia = new Materias();
                        $materia = $item;
                        ?>

                        <tr>
                        <td hidden><?php echo $materia->idmateria; ?></td>
                        <td><?php echo $materia->materia; ?></td>
                        <td><?php echo $materia->tipo; ?></td>
                        <td><a href="<?php echo constant('URL') . 'materia/verMateria/' . $materia->idmateria; ?>" class="btn-floating btn-medium waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></button></a>
                        <button class="btn-floating btn-medium waves-effect waves-black btn-flat white-text red accent-4 btn btnEliminar" data-id="<?php echo $materia->idmateria; ?>"><i class="material-icons">delete</i></button></td>
                    </tr>
                <?php } ?>