 <!--navbar-->
 <div class="navbar-fixed">
     <nav class="black">
         <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="red-text text-accent-4 medium material-icons">menu</i></a>
         <a href="<?php echo constant('URL'); ?>login/salir" class="right red-text text-accent-4"><i class="icono large material-icons">exit_to_app&nbsp;</i></a>
         <div class="nav-wrapper container red-text text-accent-4">
             <a href="http://www.oportunidades.org.sv/" target="_blank" class="brand-logo right hide-on-small-only"><img class="img responsive-img" src="<?php echo constant('URL')?>public/img/logo.png" alt="Logo"></a>
         </div>
     </nav>
 </div>
 <!--side out-->
 <ul id="slide-out" class="sidenav black">
     <!--Datos de usuario-->
     <div class="right-align">
         <a class="white-text" href="#"><i class="material-icons sidenav-close">close</i></a>
     </div>
     <div class="user-view red-text text-accent-4 center">
         <a href=""></a><i class="large material-icons">account_circle</i>
         <a href="#name"><span class="white-text name"><?php echo $_SESSION['nombre_completo']; ?></span></a>
         <a href="#email"><span class="white-text email"><?php echo $_SESSION['email']?></span></a>
     </div>
     <!--links-->
    
     <li><a class='white-text' href='<?php echo constant('URL'); ?>main'><i class='material-icons red-text text-accent-4'>home</i>Inicio</a></li>
    <?php
    if ($_SESSION['rol'] === 'A') {
        echo "<li><a class='white-text' href='".constant('URL')."nota'><i class='material-icons red-text text-accent-4'>book</i>Notas</a></li>";
        echo "<li><a class='white-text' href='".constant('URL')."materia'><i class='material-icons red-text text-accent-4'>content_paste</i>Materias</a></li>";
        echo "<li><a class='white-text' href='".constant('URL')."tipo'><i class='material-icons red-text text-accent-4'>brightness_5</i>Evaluaciones</a></li>";
    }
    ?>
    <li><a class='white-text' href='<?php echo constant('URL'); ?>estudiante'><i class='material-icons red-text text-accent-4'>group</i>Estudiantes</a></li>

    <div class="divider white"></div>
    </li>
    <?php
    if ($_SESSION['rol'] === 'A') {
        echo "<li><a class='subheader white-text'>Más opciones</a></li>";
        echo "<li><a class='white-text' href='".constant('URL')."usuario'><i class='material-icons red-text text-accent-4'>favorite_border</i>Usuarios</a></li>";
    }
    ?>
</ul>

 </body>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
 <script>
     $('input.validate, textarea.validate').characterCounter();
     document.addEventListener('DOMContentLoaded', function() {
         M.AutoInit();
     });
 </script>