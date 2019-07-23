<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notas</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col s4 m4">
                <br>
                <a href="/rop/nota" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
        <h4 class="center">Agregar notas a <?php echo $this->nota->nombre . " " . $this->nota->apellidos; ?> </h4>
        <div class="row">
            <div class="col s12 m12">
                <table class="centered">
                    <thead class="black white-text">
                        <tr>
                            <th>Materia</th>
                            <th>Periodo 1</th>
                            <th>Periodo 2</th>
                            <th>Periodo 3</th>
                            <th>Periodo 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="">
                                <?php
                                require_once 'models/materias.php';
                                foreach ($this->materias as $item) {
                                    $materia = new Materias();
                                    $materia = $item;
                                    $idmateria = $materia->idmateria;
                                    $tipo = $materia->tipo;
                                    $materia = $materia->materia;
                                    ?>
                                    <td><?php echo $materia . "-" . $tipo; ?></td>
                                    <td WIDTH="120" HEIGHT="40"><input type="number" name="nota_p1" class="validate" id="nota_p1" step="0.01" max="10" step="0.01" data-length="3">
                                        <label for="nota_p1">Nota Periodo 1</label></td>
                                    <td WIDTH="120" HEIGHT="40"><input type="number" name="nota_p2" class="validate" id="nota_p2" min="0" max="10" step="0.01" data-length="3">
                                        <label for="nota_p2">Nota Periodo 2</label></td>
                                    <td WIDTH="120" HEIGHT="40"><input type="number" name="nota_p3" class="validate" id="nota_p3" min="0" max="10" step="0.01" data-length="3">
                                        <label for="nota_p3">Nota Periodo 3</label></td>
                                    <td WIDTH="120" HEIGHT="40"><input type="number" name="nota_p4" class="validate" id="nota_p4" min="0" max="10" step="0.01" data-length="3">
                                        <label for="nota_p4">Nota Periodo 4</label></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="5">
                                <button class="btn boton-save white-text" type="submit" id="ok">Guardar<i class="material-icons left">send</i></button>&nbsp;&nbsp;
                                <a class="white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                            </td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>

</html>