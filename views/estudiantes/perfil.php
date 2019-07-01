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
        <!-- Datos personales -->
        <div class = "row">
            <div class = "col s12 m4 center"><img class="materialboxed center" src="<?php echo constant('URL')?>public/img/default-images/defaultuser.png" alt="Fundacion Gloria de Kriete" height="200" width="200"></div>
            <div class = "col s12 m4">
                <div class = "row">
                    <div class = "col s12 m12"><h5 class="center"><?= $this->estudiante->nombre.' '.$this->estudiante->apellidos?></h5></div>
                </div>
            </div>
        </div>
        <!-- Notas -->
        <div class="row"></div>
    </div>
<?php require 'views/footer.php' ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
});
</script>
</body>
</html>