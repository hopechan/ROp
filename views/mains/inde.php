<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="<?php echo constant('URL') ?>public/js/ranking.js"></script>
    <title>Ranking Oportunidades</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <?php
        $total = $this->total->idestudiante;
        if ($total <= 10) {
            $ranking = $total;
        } else {
            $ranking = $total * 0.1;
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card-panel">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <canvas id="ranking" width="200" heigth="200">Su navegador no soporta canvas, por favor actualize a una version mas reciente</canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cards-->
            <div class="col s12 m6">
                <div class="row">
                    <!--Card uno-->
                    <div class="col s12 m6">
                        <a href="<?php echo constant('URL')?>">
                        <div class="card teal black">
                            <div class="card-content white-text">
                            <i class=" medium material-icons red-text text-accent-4 right">school</i>
                            <span class="card-title center"> Ranking Estudiantes</span>
                            <p class="center"><?php echo "N°" . round($ranking) ?></p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <!--Card dos-->
                    <div class="col s12 m6">
                        <a href="<?php echo constant('URL')?>estudiante/ver">
                        <div class="card teal black">
                            <div class="card-content white-text">
                            <i class=" medium material-icons red-text text-accent-4 right">language</i>
                            <span class="card-title center">Total Estudiantes</span>
                            <p class="center"><?php echo "N°" . $total; ?></p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <!--Card tres-->
                    <div class="col s12 m12">
                        <a href="<?php echo constant('URL') ?>ranking">
                        <div class="card teal black">
                            <div class="card-content white-text">
                            <i class=" medium material-icons red-text text-accent-4 right">poll</i>
                            <span class="card-title center">Ranking Completo</span>
                            <p class="center">Ranking</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s6 m6">
                <div class="row">
                    <div class="col s12 m12">
                        <a href="<?php echo constant('URL')?>">
                        <div class="card teal black">
                            <div class="card-content white-text">
                                <i class=" medium material-icons red-text text-accent-4 right">school</i>
                                <span class="card-title center"> Nuevo Estudiante</span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col s6 m6">
                <div class="row">
                    <div class="col s12 m12">
                        <a href="<?php echo constant('URL')?>nota">
                            <div class="card teal black">
                                <div class="card-content white-text">
                                    <i class=" medium material-icons red-text text-accent-4 right">school</i>
                                    <span class="card-title center">Ingresar Notas</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1>&nbsp;</h1>
        </div>
    </div>
</body>
</html>