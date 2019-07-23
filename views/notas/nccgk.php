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
            <input type="hidden" value="<?php echo $this->year;?>" id="param">
            <div class="row">
                <div id="tabla">

                </div>
            </div>
        </div>
    <?php require 'views/footer.php' ?>
</body>
</html>
<script src="<?php echo constant('URL')?>public/js/nccgk.js"></script>