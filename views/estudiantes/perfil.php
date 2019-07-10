<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ranking</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <br>
    <div class = "container">
        <!-- Cabecera necesita mejora-->
        <div class = "row">
            <div class = "col s4 m4"><img src = "<?php echo constant('URL')?>public/img/fgk.png" alt = "Fundacion Gloria de Kriete" height = "100" width = "70"></div>
            <div class = "col s4 m4"><p>Programa Oportunidades <br> Fundacion Gloria de Kriette</p></div>
            <div class = "col s4 m4"><img src = "<?php echo constant('URL')?>public/img/logo.png" alt="Fundacion Gloria de Kriete" height = "70" width = "240"></div>
        </div>
        <hr>
        <!-- Datos Personales-->
        <div class = "row">
            <div class = "col s12 m12">
                <div class = "card-panel">
                    <div class = "row">
                        <div class = "col s8 m4 center"><img class="materialboxed center" src="<?php echo constant('URL')?>public/img/default-images/defaultuser.png" alt="Fundacion Gloria de Kriete" height="200" width="200"></div>
                        <div class = "col s12 m8 center">
                            <div class = "row"><div class = "col s12 m6"><h4><?=$this->estudiante->nombre.' '.$this->estudiante->apellidos?></h4></div></div>
                            <div class = "row">
                                <div class = "col s8 m4">Class:</div>
                                <div class = "col s8 m4"><span class = "new badge blue" data-badge-caption = ""><?= $this->estudiante->anio?></span></div>
                            </div>
                            <div class = "row">
                                <div class = "col s8 m4">Promedio:</div>
                                <div class = "col s8 m4"><span class = "new badge blue" data-badge-caption = "">9.3</span></div>
                            </div>
                            <div class = "row">
                                <div class = "col s8 m4">Telefono:</div>
                                <div class = "col s8 m4"><?= $this->estudiante->telefono;?></div>
                            </div>
                            <div class = "row">
                                <div class = "col s8 m4">email:</div>
                                <div class = "col s8 m4"><?= $this->estudiante->email;?></div>
                            </div>
                            <div class = "row">
                                <div class = "col s8 m4">Centro Escolar:</div>
                                <div class = "col s8 m4"><?= $this->estudiante->centro_escolar;?></div>
                            </div>
                            <div class = "row">
                                <div class = "col s8 m4">Direccion:</div>
                                <div class = "col s8 m4"><?= $this->estudiante->direccion;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Notas -->
        <div class="row">
            <div class = "col s12 m12">
                <div class = "card-panel">
                    <table>
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Periodo</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require 'views/footer.php' ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
    var instance = M.Tabs.getInstance(elem);
});
</script>
</body>
</html>