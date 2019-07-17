<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <div class="card-panel">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>Posición</th>
                                <th>Nombre</th>
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            //var_dump($this->ranking);
                            require_once 'models/Ranking.php';
                            $i = 1;
                            foreach ($this->ranking as $ranking) {
                                $r = new Rankings();
                                $r = $ranking;
                            ?>
                            <tr>
                                <td><?= $i?></td>
                                <td><?= $r['estudiante']?></td>
                                <td><span class="new badge blue" data-badge-caption=""><?= $r['promedio']?></span></td>
                            </tr>
                            <?php 
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <ul class="pagination center">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active black"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php require 'views/footer.php' ?>
</body>
</html>