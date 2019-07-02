<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
</head>
<body>
<?php require 'views/header.php'; ?>
<?php require 'views/navbar.php'; ?>
   <div id="tabla">

   </div>
   <div class="estu">

   </div> 
<?php require 'views/footer.php'; ?>
</body>
</html>
<script type="text/javascript">
    function cargar_pagina() {
        $('.modal').modal({
        dismissible: false, // Modal can be dismissed by clicking outside of the modal
    });
    }
</script>
<script src="<?php echo constant('URL')?>public/js/estudiante.js"></script>