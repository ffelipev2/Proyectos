<?php
include ('../accesos/sesion.php');
?>
<html>
    <head>
        <title>Plantas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- JAVASCRIPT -->
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <!-- CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <!-- EXPORTAR FICHEROS -->
        <script src="../DataTables-1.10.18/Buttons-1.5.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/Buttons-1.5.4/js/buttons.flash.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/JSZip-2.5.0/jszip.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/pdfmake-0.1.36/pdfmake.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/pdfmake-0.1.36/vfs_fonts.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/Buttons-1.5.4/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/Buttons-1.5.4/js/buttons.print.min.js" type="text/javascript"></script>
        <!-- DATAPICKER -->
        <script src="../js/gijgo.min.js" type="text/javascript"></script>
        <link href="../css/gijgo.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/popper.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- GRAFICOS -->
        <script src="../js/chat.min.js" type="text/javascript"></script>
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
                    <li class="nav-item active">
                        <a style=""class="nav-link font-weight-bold" href="plantas.php"> General </a>
                    </li>
                    <li class="nav-item">
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
                    <li class="nav-item">
                        <a style=""class="nav-link font-weight-bold" href="galeria.php">Galería</a>
                    </li>
                </ul>
            </div>

        </nav>

        <?PHP
        date_default_timezone_set("Chile/Continental");
        $fecha_hoy = date("d-m-y");
        require_once "modelo.php";
        $conn = new ConneccionMySQL();
        $conn->Crearconexion();
        $conn->mostrarPlantas();
        $conn->Cerrarconexion();
        ?>

        <!--
        <div class = "container " style = "background:aquamarine">
            <div class = "row">
                <div class = "mx-auto">Temperatura</div>
                <div class = "mx-auto">Humedad Relativa</div>
                <div class = "mx-auto">Humedad Sustrato</div>
                </br>
            </div>
        <!--
        <div class = "row">
            <div class = "mx-auto img-fluid"><img src = "../images/temperatura.png" alt = "Responsive image" height = "100" width = "100"/></div>
            <div class = "mx-auto img-fluid"> <img src = "../images/humedad_relativa.png" alt = "Responsive image" height = "100" width = "100"/></div>
            <div class = "mx-auto img-fluid"> <img src = "../images/humedad_sustrato.png" alt = "Responsive image" height = "100" width = "100"/></div>

        </div>

        <div class = "row">
            <div class = "mx-auto">Planta 1</div>
            <div class = "mx-auto"> 100</div>
            <div class = "mx-auto"> 200</div>
            <div class = "mx-auto"> seco</div>
        </div>
    </div>

    <div class = "container " style = "background:aquamarine">
        <!--
        <div class = "row">
            <div class = "mx-auto img-fluid"><img src = "../images/temperatura.png" alt = "Responsive image" height = "100" width = "100"/></div>
            <div class = "mx-auto img-fluid"> <img src = "../images/humedad_relativa.png" alt = "Responsive image" height = "100" width = "100"/></div>
            <div class = "mx-auto img-fluid"> <img src = "../images/humedad_sustrato.png" alt = "Responsive image" height = "100" width = "100"/></div>

        </div>

        <div class = "row">
            <div class = "mx-auto">Planta 2</div>
            <div class = "mx-auto"> 100</div>
            <div class = "mx-auto"> 200</div>
            <div class = "mx-auto"> seco</div>
        </div>
    </div>

    <div class = "container " style = "background:aquamarine">
        <!--
        <div class = "row">
            <div class = "mx-auto img-fluid"><img src = "../images/temperatura.png" alt = "Responsive image" height = "100" width = "100"/></div>
            <div class = "mx-auto img-fluid"> <img src = "../images/humedad_relativa.png" alt = "Responsive image" height = "100" width = "100"/></div>
            <div class = "mx-auto img-fluid"> <img src = "../images/humedad_sustrato.png" alt = "Responsive image" height = "100" width = "100"/></div>

        </div>

        <div class = "row">
         <div class = "mx-auto">Planta 3</div>
            <div class = "mx-auto"> 100</div>
            <div class = "mx-auto"> 200</div>
            <div class = "mx-auto"> seco</div>
        </div>
    </div>
        -->

    </body>

</html>
<script src="../js/scripts.js" type="text/javascript"></script>
<!--
<!DOCTYPE html>
<html>
<head>
<title>Prueba de Bootstrap</title>
<link href = "css/bootstrap.min.css" rel = "stylesheet">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
</head>
<body>

<div class = "container">

<div class = "row">
<div class = "col-lg-4" style = "background-color:#aaa">
<h1>Columna 1</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-lg-4" style = "background-color:#bbb">
<h1>Columna 2</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-lg-4" style = "background-color:#ccc">
<h1>Columna 3</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
</div>

<hr>

<div class = "row">
<div class = "col-md-4" style = "background-color:#aaa">
<h1>Columna 1</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-md-4" style = "background-color:#bbb">
<h1>Columna 2</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-md-4" style = "background-color:#ccc">
<h1>Columna 3</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
</div>

<hr>

<div class = "row">
<div class = "col-sm-4" style = "background-color:#aaa">
<h1>Columna 1</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-sm-4" style = "background-color:#bbb">
<h1>Columna 2</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-sm-4" style = "background-color:#ccc">
<h1>Columna 3</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
</div>

<hr>

<div class = "row">
<div class = "col-xs-4" style = "background-color:#aaa">
<h1>Columna 1</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-xs-4" style = "background-color:#bbb">
<h1>Columna 2</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
<div class = "col-xs-4" style = "background-color:#ccc">
<h1>Columna 3</h1>
<p>Esto es una prueba de bootstrap.</p>
</div>
</div>

</div>

</body>


-->