<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<body>
    <?php include("navbar.php")?>
    
    <div class="container contenedor">
      <div></div>
      <div class="row">
          <ul id="tabsNotas" class="tabs col s8 m8">
            <li class="tab col s3"><a class="active" href="#tbCE">Centro Escolar</a></li>
            <li class="tab col s3"><a href="#tbOpor">Oportunidades</a></li>
            <li class="tab col s3"><a href="#tbCert">Certificaciones</a></li>
          </ul>
          <div class="input-field col s4 m4">
            <i class="material-icons prefix">search</i>
            <input type="text" name="txtBusqueda" id="txtBusqueda" class="validate">
            <label for="txtBusqueda">Buscar...</label>
          </div>
          <div id="tbCE" class=""><?php include_once("notaCE.php")?></div>
          <div id="tbOpor" class=""></div>
          <div id="tbCert" class=""></div>
      </div>
    </div> <!-- Fin container-->
</body>
<?php include("footer.php")?>
</html>

<div class="input-field col s4 m4 l6">
            <i class="material-icons prefix">search</i>
            <input type="text" name="txtBusqueda" id="txtBusqueda" class="validate">
            <label for="txtBusqueda">Buscar ...</label>
          </div>