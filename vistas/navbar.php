 <!--navbar-->
 <div class="navbar-fixed">
        <nav class="black">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="red-text text-accent-4 medium material-icons">menu</i></a>
            <a href="#" class="right red-text text-accent-4">Cerrar sesión </a>
            <div class="nav-wrapper container red-text text-accent-4">
                <img class="responsive-img right" src="/ROp/vistas/img/images.png" width="260px" alt="Logo">
            </div>
        </nav>
    </div>
    <!--side out-->
    <ul id="slide-out" class="sidenav black">
        <!--Datos de usuario-->
        <li>
            <div class="right-align">
                <a class="white-text" href=""><i class="material-icons sidenav-close">close</i></a>
            </div>
            <div class="user-view red-text text-accent-4">
                <a href=""></a><i class="large material-icons">account_circle</i>
                <a href="#name"><span class="white-text name">Roberto Morales</span></a>
                <a href="#email"><span class="black-text email">Robertomorales1@gmail.com</span></a>
            </div>
        </li>
        <!--links-->
        <li ><a class="white-text" href="/Rop/index.php"><i class="material-icons red-text text-accent-4">home</i>Inicio</a></li>
        <li><a class="white-text" href="/Rop/vistas/agregarEstudiante.php"><i class="material-icons red-text text-accent-4">school</i>Estudiantes</a></li>
        <li><a class="white-text" href="#!"><i class="material-icons red-text text-accent-4">book</i>Notas</a></li>
        <li><a class="white-text" href="/Rop/vistas/vistaTipo.php"><i class="material-icons red-text text-accent-4">brightness_5</i>Certificación</a></li>
        <li>
            <div class="divider white"></div>
        </li>
        <li><a class="subheader white-text">Más opciones</a></li>
        <li><a class="white-text" href="#!"><i class="material-icons red-text text-accent-4">content_paste</i>Item 1</a></li>
    </ul>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
</script>
