<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!--navbar-->
    <div class="navbar-fixed">
        <nav class="red accent-4">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="medium material-icons black-text">menu</i></a>
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo right black-text">Logo</a>
            </div>
        </nav>
    </div>
    <!--side out-->
    <ul id="slide-out" class="sidenav red accent-4">
        <!--Datos de usuario-->
        <li>
            <div class="right black-text">
                <i class="material-icons">close</i>
            </div>
            <div class="user-view black-text">
                <a href=""></a><i class="large material-icons">account_circle</i>
                <a href="#name"><span class="black-text name">Roberto Morales</span></a>
                <a href="#email"><span class="black-text email">Robertomorales1@gmail.com</span></a>
            </div>
        </li>
        <!--links-->
        <li ><a class="black-text" href="#!"><i class="material-icons black-text">content_paste</i>Item 1</a></li>
        <li><a class="black-text" href="#!"><i class="material-icons black-text">create</i>Item 2</a></li>
        <li><a class="black-text" href="#!"><i class="material-icons black-text">group</i>Item 3</a></li>
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

</html>