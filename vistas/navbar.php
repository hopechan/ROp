 <!--navbar-->
 <div class="navbar-fixed">
        <nav class="red accent-4">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="medium material-icons black-text">menu</i></a>
            <a href="#" class="right black-text">Cerrar sesión </a>
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo right black-text">Logo</a>
            </div>
        </nav>
    </div>
    <!--side out-->
    <ul id="slide-out" class="sidenav red accent-4">
        <!--Datos de usuario-->
        <li>
            <div class="right-align black-text">
                <i class="material-icons sidenav-close">close</i>
            </div>
            <div class="user-view black-text">
                <a href=""></a><i class="large material-icons">account_circle</i>
                <a href="#name"><span class="black-text name">Roberto Morales</span></a>
                <a href="#email"><span class="black-text email">Robertomorales1@gmail.com</span></a>
            </div>
        </li>
        <!--links-->
        <li ><a class="black-text" href="/Rop/index.php"><i class="material-icons black-text">home</i>Inicio</a></li>
        <li><a class="black-text" href="./vistas/agregarEstudiante.php"><i class="material-icons black-text">school</i>Estudiantes</a></li>
        <li><a class="black-text" href="#!"><i class="material-icons black-text">book</i>Notas</a></li>
        <li><a class="black-text" href="#!"><i class="material-icons black-text">brightness_5</i>Certificación</a></li>
        <li>
            <div class="divider black"></div>
        </li>
        <li><a class="subheader black-text">Más opciones</a></li>
        <li><a class="black-text" href="#!"><i class="material-icons black-text">content_paste</i>Item 1</a></li>
    </ul>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
</script>
