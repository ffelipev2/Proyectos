<?php
include ('../accesos/sesion.php');
?>
<!DOCTYPE html>
<html>
    <head>     
        <title>Plantas</title>
        <link rel="shortcut icon" href="../images/icons/planta.ico">
        <meta charset="utf-8">

        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

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
        <script src="../js/rango_fechas.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.js" type="text/javascript"></script>
        <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.ui.datepicker-es.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if ($_SESSION['activo'] != TRUE) {
            header("Location:https://titanx.cl/");
        }
        ?>
        <!-- INICIO NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: #02AA02;">
            <img src="../images/icons/Logo.png" width="55" height="50" class="d-inline-block align-top" alt="">
            <span>&nbsp; &nbsp;&nbsp;</span>
            <a href="/" class="navbar-brand"><img src="../images/icons/Logo2.png" width="150" height="28"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="navbar-collapse collapse" id="navbar6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos.php">Planta 1 </a>
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
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="consultar.php">Consultar</a>
                    </li>
                </ul>
            </div>
        </nav>

        </br></br>
        <div class="container h1"><div class="row justify-content-center"> <p>Consultar entre Fechas</p> </div> </div>
        </br>
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="col-md-2 offset-md-5">
                    <form id="form" name="form" method="post">
                        <div class="form-group">
                            <p class="lead">Desde</p>
                            <input type="text" id="from" name="from" autocomplete="off" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <p class="lead">Hasta</p>
                            <input type="text" id="to" name="to" autocomplete="off" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <p class="lead">Seleccione una Planta</p>
                            <select id="idcategoria" name="numero_planta" class="form-control selectpicker" data-live-search="true" required>
                                <option selected value="datos_planta_1">Planta 1</option>
                                <option value="datos_planta_2">Planta 2</option>
                                <option value="datos_planta_3">Planta 3</option>
                                <option value="datos_planta_4">Planta 4</option>
                                <option value="datos_planta_5">Planta 5</option>
                                <option value="datos_planta_6">Planta 6</option>
                                <option value="datos_planta_7">Planta 7</option>
                                <option value="datos_planta_8">Planta 8</option>
                                <option value="datos_planta_9">Planta 9</option>
                                <option value="datos_planta_10">Planta 10</option>
                            </select>
                        </div>
                        </br>
                        <button class="btn btn-primary " name="consultar_planta" type="submit">Ver</button>
                    </form>
                </div>
            </div>
        </div>
        </br></br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 offset-md-3">
                    <?PHP
                    require_once "modelo.php";
                    $conn = new ConneccionMySQL();
                    $conn->Crearconexion();
                    if (isset($_POST['consultar_planta'])) {
                        $conn->datos_por_rango($_POST['numero_planta'], $_POST['from'], $_POST['to']);
                        //echo $_POST['numero_planta'].'</br>';
                        //echo $_POST['startDate'].'</br>';
                        //echo $_POST['endDate'].'</br>';
                    }
                    $conn->Cerrarconexion();
                    ?>
                </div>
            </div>

        </div>
    </body>
</html>
<script src="../js/scripts.js" type="text/javascript"></script>
