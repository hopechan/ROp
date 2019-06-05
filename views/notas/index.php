<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <br><br>
    <div class="container">
        <div class="row">
          <ul id="tabsNotas" class="tabs col s8 m8">
            <li class="tab col s3"><a class="active" href="#tbCE">Centro Escolar</a></li>
            <li class="tab col s3"><a href="#tbOpor">CCGK</a></li>
            <li class="tab col s3"><a href="#tbCert">Certificaciones</a></li>
          </ul>
          <div class="input-field col s4 m4">
            <i class="material-icons prefix">search</i>
            <input type="text" name="txtBusqueda" id="txtBusqueda" class="validate">
            <label for="txtBusqueda">Buscar...</label>
          </div>
          <div id="tbCE" class="">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th data-field="id">Estudiante</th>
                        <th data-field="name">Materia</th>
                        <th data-field="price">Nota</th>
                        <th data-field="price">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once 'models/notas.php';
                        foreach ($this->notas as $item) {
                            $n = new Nota();
                            $nota = $item;

                    ?>
                    <tr>
                        
                    </tr>
                        <?php }?>
                </tbody>
            </table>
          </div>
          <div id="tbOpor" class=""></div>
          <div id="tbCert" class=""></div>
      </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>