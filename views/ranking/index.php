<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo constant('URL')?>public/css/vanilla-dataTables.css" rel="stylesheet" type="text/css">
    <script src="<?php echo constant('URL')?>public/js/libs/vanilla-dataTables.js" type="text/javascript"></script>
    <script  type="module" src="<?php echo constant('URL')?>public/js/vistaRanking.js"></script>
    <title>Ranking</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>

    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel black">
                    <span class="white-text"><h5 class="center">Ranking</h5></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div>
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">info</i>Class of 2017<i class="material-icons">arrow_drop_down</i></div>
                            <div class="collapsible-body" id="actual">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Posición</th>
                                        <th>Estudiante</th>
                                        <th>Promedio</th>
                                    </tr>
                                    </thead>
                                    <tbody id="class2017"></tbody>
                                </table>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">info</i>Class of 2018<i class="material-icons">arrow_drop_down</i></div>
                            <div class="collapsible-body" id="anterior">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Posición</th>
                                        <th>Estudiante</th>
                                        <th>Promedio</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">info</i>Class of 2019<i class="material-icons">arrow_drop_down</i></div>
                            <div class="collapsible-body" id="ultimo">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Posición</th>
                                        <th>Estudiante</th>
                                        <th>Promedio</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>