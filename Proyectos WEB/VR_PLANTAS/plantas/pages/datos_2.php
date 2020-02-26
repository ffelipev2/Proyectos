<?php
include ('../accesos/sesion.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Plantas</title>
        <link rel="shortcut icon" href="../images/icons/planta.ico">
        <meta http-equiv="Refresh" content="600" URL="http://192.168.0.120/datos_2.php">
        <meta charset="utf-8">
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
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="datos.php">Planta 1</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="datos_2.php">Planta 2 <span class="sr-only">Home</span></a>
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
        </br></br>
        <div class="container h1"><div class="row justify-content-center"> <p>Planta 2</p> </div> </div>
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-2 col-md-offset-5">
                        <form method="post" action="">
                            <div class="form-group"> 
                                <label> Datos por Fecha</label>
                                <input id="datepicker" width="276" name="dato_fecha" autocomplete="off"/>
                            </div>
                            <div class="form-group"> 
                                <button class="btn btn-primary " name="consultar" type="submit">Ver</button>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?PHP
                require_once "modelo.php";
                $conn = new ConneccionMySQL();
                $conn->Crearconexion();
                if (isset($_POST['consultar'])) {
                    $dato_fecha = $_POST['dato_fecha'];
                    echo '<div class="col-lg-7" >';
                    $conn->mostrar_datos('datos_planta_2', 'plantas', $dato_fecha);
                    echo '</div>';
                    echo '<div class="col-lg-4"  >';
                    $conn->mostrar_dashboard('datos_planta_2', 'plantas', $dato_fecha);
                    echo '</div>';
                } else {
                    $dato_fecha = date("d-m-y");
                    echo '<div class="col-lg-7" >';
                    $conn->mostrar_datos('datos_planta_2', 'plantas', $dato_fecha);
                    echo '</div>';
                    echo '<div class="col-lg-4"  >';
                    $conn->mostrar_dashboard('datos_planta_2', 'plantas', $dato_fecha);
                    echo '</div>';
                }
                echo '</br> </br>';
                $conn->Cerrarconexion();
                ?>
            </div>
        </div>
        <div class="container">
            <div class="row">              
                <?php
                require_once "../accesos/config.php";
                $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
                $sqlQuery = "SELECT hora FROM datos_planta_2 WHERE fecha = '" . $dato_fecha . "'";
                $consulta = mysqli_query($conn, $sqlQuery);
                ?>
                <canvas id="bar-chart" width="800" height="450"></canvas>
                <script>
                    new Chart(document.getElementById("bar-chart"), {
                        type: 'bar',
                        data: {
                            labels: [<?php
                while ($result = mysqli_fetch_array($consulta)) {
                    echo '"' . $result["hora"] . '",';
                }
                ?>],
                            datasets: [
                                {
                                    label: "Temperatura",
                                    backgroundColor: "rgba(11,231,255)",
<?php
$sqlQuery2 = "SELECT temperatura FROM datos_planta_2 WHERE fecha = '" . $dato_fecha . "'";
$consulta = mysqli_query($conn, $sqlQuery2);
?>
                                    data: [<?php
while ($result = mysqli_fetch_array($consulta)) {
    echo $result['temperatura'] . ',';
}
?>]
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                            },
                            legend: {display: false},
                            title: {
                                display: true,
                                text: 'Temperaturas'
                            }
                        }
                    });
                </script>
                <?php
                mysqli_close($conn);
                ?>
            </div>
        </div> 



    </body>
</html>
<script src="../js/scripts.js" type="text/javascript"></script>