<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<body>
    <?php include("navbar.php")?>
    
    <div class="container contenedor">
        <ul id="tabsNotas" class="tabs">
          <li class="tab col s3"><a href="#tbCE">Centro Escolar</a></li>
          <li class="tab col s3"><a class="active" href="#tbOpor">Oportunidades</a></li>
          <li class="tab col s3"><a href="#tbCert">Certificaciones</a></li>
        </ul>
        <div id="tbCE" class="col s12"><?php include_once("notaCE.php")?></div>
        <div id="tbOpor" class="col s12"></div>
        <div id="tbCert" class="col s12"></div>
    </div> <!-- Fin container-->
</body>
<?php include("footer.php")?>
</html>