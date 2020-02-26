<?php
include ('../accesos/sesion.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Galería</title>
        <link rel="shortcut icon" href="../images/icons/planta.ico">
        <meta http-equiv="Refresh" content="600" URL="http://192.168.0.120/datos.php">
        <meta charset="utf-8">
        <!-- JAVASCRIPT -->
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../js/galeria.js" type="text/javascript"></script>
        <!-- CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/galeria.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>

        <!-- INICIO NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: #02AA02;">
            <img src="../images/icons/Logo.png" width="55" height="50" class="d-inline-block align-top" alt="">
            <span>&nbsp; &nbsp;&nbsp;</span>
            <a href="../accesos/salir.php?sal=si" class="navbar-brand"><img src="../images/icons/Logo2.png" width="150" height="28"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="navbar-collapse collapse" id="navbar6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a style=""class="nav-link font-weight-bold" href="plantas.php"> General </a>
                    </li>
                    <li class="nav-item ">
                        <a style=""class="nav-link font-weight-bold" href="datos.php"> Planta 1 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_2.php">Planta 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_3.php">Planta 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_4.php">Planta 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_5.php">Planta 5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_6.php">Planta 6</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_7.php">Planta 7</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_8.php">Planta 8</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_9.php">Planta 9</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos_10.php">Planta 10</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="consultar.php">Consultar</a>
                    </li>
                    <li class="nav-item active">
                        <a style=""class="nav-link font-weight-bold" href="galeria.php">Galería</a>
                    </li>
                </ul>
            </div>
        </nav>
        </br></br>
        <div class="container">

            <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Galeria Plantas</h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-left">

                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="../images/1.jpeg" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="../images/2.jpeg" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="../images/3.jpeg" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="../images/4.jpeg" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="../images/5.jpeg" alt="">
                    </a>
                </div>
                <!--
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/8mUEy0ABdNE/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/G9Rfc1qccH4/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aJeH0KcFkuc/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/p2TQ-3Bh3Oo/400x300" alt="">
                    </a>
                </div>
            </div>
-->
        </div>


    </body>
</html>
<script src="../js/scripts.js" type="text/javascript"></script>