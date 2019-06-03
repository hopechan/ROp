<?php
include("../controlador/controladorTipo.php");
            //agregando un tipo
            if (isset($_POST['name'])) {
                $tipo = $_POST['name'];
                $descripcion = $_POST['descripcion'];
                $ct = new ControladorTipo();
                $nuevoTipo = new Tipo();
                $nuevoTipo->setIdTipo(null);
                $nuevoTipo->setTipo($tipo);
                $nuevoTipo->setDescripcion($descripcion);
                $ct->agregarTipo($nuevoTipo);
            }
            ?>