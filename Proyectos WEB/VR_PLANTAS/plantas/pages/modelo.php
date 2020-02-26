<?php

date_default_timezone_set("Chile/Continental");

class ConneccionMySQL {

// Definicion de atributos
    private $host;
    private $user;
    private $password;
    private $database;
    private $conexion;

    public function __construct() {
//Constructor
        require_once "../accesos/config.php";
        $this->host = HOST;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->database = DATABASE;
    }

    public function Crearconexion() {
// Metodo que crea y retorna la conexion a la BD.
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conexion->connect_errno) {
            die("Error al conectarse a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error);
        }
    }

    public function Cerrarconexion() {
        $this->conexion->close();
    }

    public function insertar_datos() {

        $mac = $_POST['mac'];
        $temperatura = $_POST['temperatura'];
        $humedad = $_POST['humedad'];
        $hora = 16.00;
        $insertar = "INSERT INTO datos_arduino(mac, temperatura, humedad, hora) VALUES ('$mac','$temperatura','$humedad','$hora')";
        $this->conexion->query($insertar);
    }

    public function mostrarPlantas() {
        $fecha_hoy = date("d-m-y");
        // planta 1
        $consulta = mysqli_query($this->conexion, "SELECT * FROM datos_planta_1 WHERE fecha = '$fecha_hoy' ORDER BY hora DESC LIMIT 1");
        echo'<table id="plantas" class="table table-striped table-bordered" cellspacing="0" width="100%" height ="0%" >
                    <thead>
                        <tr>
                            <th></th>
                            <th>T°</th>
                            <th>H %</th>
                            <th>Sustrato</th>
                            <th>Hr</th>
                        </tr>
                    </thead>
                    <tbody>';
        if (mysqli_num_rows($consulta) > 0) {
            $result = mysqli_fetch_array($consulta);
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos.php">P1</a> </td>';
            echo '<td>' . round($result[1], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[2], 1) . ' %' . '</td>';
            //echo '<td>' . $result['humedad2'] . ' %' . '</td>';
            if ($result[3] >= 2100) {
                echo '<td><font color="#EA250E"> Seco </font> </td>';
            } elseif ($result[3] < 2100 && $result[3] >= 1700) {
                echo '<td><font color="#24F821"> Semi Húmedo </font> </td>';
            } elseif ($result[3] < 1700) {
                echo '<td><font color="#24F821"> Húmedo </font> </td>';
            }
            echo '<td>' . $result[5] . '</td>';
        } else {
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos.php">P1</a> </td>';
            echo '<td> - °C</td>';
            echo '<td> -  %</td>';
            echo '<td> -  </td>';
            echo '<td> -  </td>';
        }
        // planta 2
        $consulta = mysqli_query($this->conexion, "SELECT * FROM datos_planta_2 WHERE fecha = '$fecha_hoy' ORDER BY hora DESC LIMIT 1");
        if (mysqli_num_rows($consulta) > 0) {
            $result = mysqli_fetch_array($consulta);
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_2.php">P2</a> </td>';
            echo '<td>' . round($result[1], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[2], 1) . ' %' . '</td>';
            //echo '<td>' . $result['humedad2'] . ' %' . '</td>';
            if ($result[3] >= 2100) {
                echo '<td><font color="#EA250E"> Seco </font> </td>';
            } elseif ($result[3] < 2100 && $result[3] >= 1700) {
                echo '<td><font color="#24F821"> Semi Húmedo </font> </td>';
            } elseif ($result[3] < 1700) {
                echo '<td><font color="#24F821"> Húmedo </font> </td>';
            }
            echo '<td>' . $result[5] . '</td>';
        } else {
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_2.php">P2</a> </td>';
            echo '<td> - °C</td>';
            echo '<td> -  %</td>';
            echo '<td> -  </td>';
            echo '<td> -  </td>';
        }
        // planta 3
        $consulta = mysqli_query($this->conexion, "SELECT * FROM datos_planta_3 WHERE fecha = '$fecha_hoy' ORDER BY hora DESC LIMIT 1");
        if (mysqli_num_rows($consulta) > 0) {
            $result = mysqli_fetch_array($consulta);
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_3.php">P3</a> </td>';
            echo '<td>' . round($result[1], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[2], 1) . ' %' . '</td>';
            //echo '<td>' . $result['humedad2'] . ' %' . '</td>';
            if ($result[3] >= 2100) {
                echo '<td><font color="#EA250E"> Seco </font> </td>';
            } elseif ($result[3] < 2100 && $result[3] >= 1700) {
                echo '<td><font color="#24F821"> Semi Húmedo </font> </td>';
            } elseif ($result[3] < 1700) {
                echo '<td><font color="#24F821"> Húmedo </font> </td>';
            }
            echo '<td>' . $result[5] . '</td>';
        } else {
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_3.php"> P3 </a> </td>';
            echo '<td> - °C</td>';
            echo '<td> -  %</td>';
            echo '<td> -  </td>';
            echo '<td> -  </td>';
        }
        // planta 4
        $consulta = mysqli_query($this->conexion, "SELECT * FROM datos_planta_4 WHERE fecha = '$fecha_hoy' ORDER BY hora DESC LIMIT 1");
        if (mysqli_num_rows($consulta) > 0) {
            $result = mysqli_fetch_array($consulta);
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_4.php">P4</a> </td>';
            echo '<td>' . round($result[1], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[2], 1) . ' %' . '</td>';
            //echo '<td>' . $result['humedad2'] . ' %' . '</td>';
            if ($result[3] >= 2100) {
                echo '<td><font color="#EA250E"> Seco </font> </td>';
            } elseif ($result[3] < 2100 && $result[3] >= 1700) {
                echo '<td><font color="#24F821"> Semi Húmedo </font> </td>';
            } elseif ($result[3] < 1700) {
                echo '<td><font color="#24F821"> Húmedo </font> </td>';
            }
            echo '<td>' . $result[5] . '</td>';
        } else {
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_4.php">P4</a> </td>';
            echo '<td> - °C</td>';
            echo '<td> -  %</td>';
            echo '<td> -  </td>';
            echo '<td> -  </td>';
        }
        // planta 5
        $consulta = mysqli_query($this->conexion, "SELECT * FROM datos_planta_5 WHERE fecha = '$fecha_hoy' ORDER BY hora DESC LIMIT 1");
        if (mysqli_num_rows($consulta) > 0) {
            $result = mysqli_fetch_array($consulta);
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_5.php">P5</a> </td>';
            echo '<td>' . round($result[1], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[2], 1) . ' %' . '</td>';
            //echo '<td>' . $result['humedad2'] . ' %' . '</td>';
            if ($result[3] >= 2100) {
                echo '<td><font color="#EA250E"> Seco </font> </td>';
            } elseif ($result[3] < 2100 && $result[3] >= 1700) {
                echo '<td><font color="#24F821"> Semi Húmedo </font> </td>';
            } elseif ($result[3] < 1700) {
                echo '<td><font color="#24F821"> Húmedo </font> </td>';
            }
            echo '<td>' . $result[5] . '</td>';
        } else {
            echo "<tr>";
            echo '<td> <a href="https://titanx.cl/plantas/pages/datos_5.php">P5</a> </td>';
            echo '<td> - °C</td>';
            echo '<td> -  %</td>';
            echo '<td> -  </td>';
            echo '<td> -  </td>';
        }
        echo "</tr>";
        echo'</tbody>
            </table>';
    }

    public function mostrar_datos($nombre_tabla, $nombre_id, $fecha) {
        //$fecha_prueba = $fecha;
        $consulta = mysqli_query($this->conexion, "SELECT temperatura, humedad1, humedad2, fecha, hora FROM " . $nombre_tabla . " WHERE fecha = '$fecha'" . " ORDER BY fecha DESC, hora DESC");
        echo'<table id="plantas_tablas" class="table table-striped table-bordered" cellspacing="0" width="100%" height ="0%" >
                    <thead>
                        <tr>
                            <th>Temperatura</th>
                            <th>Humedad Relativa</th>
                            <th>Humedad del Sustrato</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($result = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo '<td>' . $result['temperatura'] . ' °C' . '</td>';
            echo '<td>' . $result['humedad1'] . ' %' . '</td>';
            //echo '<td>' . $result['humedad2'] . ' %' . '</td>';
            if ($result['humedad2'] >= 2100) {
                echo '<td><font color="#EA250E"> Seco </font> </td>';
            } elseif ($result['humedad2'] < 2100 && $result['humedad2'] >= 1700) {
                echo '<td><font color="#24F821"> Semi Húmedo </font> </td>';
            } elseif ($result['humedad2'] < 1700) {
                echo '<td><font color="#24F821"> Húmedo </font> </td>';
            }
            echo '<td>' . $result['fecha'] . '</td>';
            echo '<td>' . $result['hora'] . '</td>';
            echo "</tr>";
        }
        echo'</tbody>
            </table>';
    }

    public function mostrar_dashboard($nombre_tabla, $nombre_id, $fecha) {
        //$consulta = mysqli_query($this->conexion, "SELECT MIN(temperatura) AS temperatura_min from datos_planta_1 where fecha='02-12-18' UNION ALL select MAX(temperatura) AS temperatura_max from datos_planta_1 where fecha='02-12-18' UNION ALL select MIN(humedad1) as humedad_min from datos_planta_1 where fecha='02-12-18'");
        $consulta = mysqli_query($this->conexion, "SELECT  
  (select MAX(temperatura) from $nombre_tabla where fecha='$fecha') AS temp_min
, (select MIN(temperatura) from $nombre_tabla where fecha='$fecha') AS temp_max
, (select MAX(humedad1) from $nombre_tabla  where fecha='$fecha') AS hum1_max
, (select MIN(humedad1) from $nombre_tabla where fecha='$fecha') AS hum1_min
, (select MAX(humedad2) from $nombre_tabla where fecha='$fecha') AS hum2_max
, (select MIN(humedad2) from $nombre_tabla where fecha='$fecha') AS hum2_min");
        echo'<table id="plantas_tablas" class="table table-striped table-bordered" cellspacing="0" width="100%" height ="0%">
                    <thead>
                        <tr>
                            <th>T° Máxima del día</th>
                            <th>T° Mínima del día </th>
                            <th>H % Máxima del día</th>
                            <th>H % Mínima del día</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($result = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo '<td>' . round($result[0], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[1], 1) . ' °C' . '</td>';
            echo '<td>' . round($result[2], 1) . ' %' . '</td>';
            echo '<td>' . round($result[3], 1) . ' %' . '</td>';
            echo "</tr>";
        }
    }

    public function mostrar_datos_todos($nombre_tabla, $nombre_id) {
        $fecha = date("d-m-y");
        $consulta = mysqli_query($this->conexion, "SELECT temperatura, humedad1, humedad2, fecha, hora FROM " . $nombre_tabla . " ORDER BY fecha DESC, hora DESC");
        //$consulta = mysqli_query($this->conexion, "SELECT temperatura, humedad1, humedad2, fecha, hora FROM " . $nombre_tabla . " WHERE fecha = '$fecha'" . " ORDER BY fecha DESC, hora DESC");
        echo'<table id="plantas_tablas" class="table table-striped table-bordered" width="50%" height ="0%">
                    <thead>
                        <tr>
                            <th>Temperatura</th>
                            <th>Humedad relativa</th>
                            <th>Humedad de la planta</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($result = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo '<td>' . $result['temperatura'] . '</td>';
            echo '<td>' . $result['humedad1'] . '</td>';
            echo '<td>' . $result['humedad2'] . '</td>';
            echo '<td>' . $result['fecha'] . '</td>';
            echo '<td>' . $result['hora'] . '</td>';
            echo "</tr>";
        }
        echo'</tbody>
            </table>';
    }

    public function datos_por_rango($numero_planta, $fecha_inicio, $fecha_termino) {

        $consulta = mysqli_query($this->conexion, "SELECT temperatura, humedad1, humedad2, fecha, hora FROM $numero_planta WHERE fecha >='$fecha_inicio' AND fecha <= '$fecha_termino' ORDER BY fecha DESC, hora DESC");
        //$consulta = mysqli_query($this->conexion, "SELECT temperatura, humedad1, humedad2, fecha, hora FROM " . $nombre_tabla . " WHERE fecha = '$fecha'" . " ORDER BY fecha DESC, hora DESC");
        echo'<table id="plantas_tablas" class="table table-striped table-bordered" width="50%" height ="0%">
                    <thead>
                        <tr>
                            <th>Temperatura</th>
                            <th>Humedad relativa</th>
                            <th>Humedad de la planta</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($result = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo '<td>' . $result[0] . ' C°</td>';
            echo '<td>' . $result[1] . ' %</td>';
            if ($result[2] > 800) {
                $Humfinal = 0;
            } else if ($result[2] < 450) {
                //echo '<script> alert("estoy aqui");</script>';
                $Humfinal = 100;
            } else {
                $dif = $result[2] - 450;
                if ($dif <= 140) {
                    $Humfinal = 100 - (($dif * 50) / 140);
                } else {
                    $Humfinal = (((350 - $dif) * 50) / 210);
                }
            }
            echo '<td>' . round($Humfinal, 1) . ' % </td>';
            echo '<td>' . $result[3] . '</td>';
            echo '<td>' . $result[4] . '</td>';
            echo "</tr>";
        }
        echo'</tbody>
            </table>';
    }

    public function validarUsuario() {

        echo "hola";

        /*
          if (!$consulta) {
          // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " .
          echo mysqli_error($mysqli);
          // si la consulta falla es bueno evitar que el código se siga ejecutando
          exit;
          }
          if ($user = mysqli_fetch_assoc($consulta)) {
          echo "<script> alert('Correcto!'); </script>";
          } else {
          //echo "<script> alert('Incorrecto!'); </script>";
          echo "<script> location.href=\"login.php\" </script>";
          }
         */
    }

    public function mostrar_temp_acuario() {
        $fecha_hoy = date("d-m-y");
        //$fecha_hoy = "02-01-19";
        $consulta = mysqli_query($this->conexion, "SELECT * FROM temp_acuario WHERE fecha = '$fecha_hoy' ORDER BY hora DESC LIMIT 1");
        echo'<table class="table table-striped table-bordered" cellspacing="0" width="100%" height ="0%">
      <thead>
            <tr>
                <th>Temperatura Acuario N° 1 </th>
                <th>Temperatura Acuario N° 2 </th>
                <th>Temperatura Acuario N° 3 </th>
                <th>Temperatura y Humedad Ambiental</th>
                <th>Hora</th>
            </tr>
      </thead>
      <tbody>';
        while ($result = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            if ($result[2] >= 22 && $result[2] <= 29) {
                echo '<td>' . $result[2] . ' °C' .
                '<div style = "width:0px;
                height:0px;
                border-left:25px solid transparent; 
                border-right:25px solid transparent;
                border-bottom:25px solid #14E633;
                font-size:0px;
                line-height:0px;"> </div>' . '</td>';
            } else {
                echo '<td>' . $result[2] . ' °C' .
                '<div style = "width:0px;
                height:0px;
                border-left:25px solid transparent; 
                border-right:25px solid transparent;
                border-bottom:25px solid #F9142C;
                font-size:0px;
                line-height:0px;"> </div>' . '</td>';
            }
            if ($result[3] >= 22 && $result[3] <= 29) {
                echo '<td>' . $result[3] . ' °C' .
                '<div style = "width:0px;
                height:0px;
                border-left:25px solid transparent; 
                border-right:25px solid transparent;
                border-bottom:25px solid #14E633;
                font-size:0px;
                line-height:0px;"> </div>' . '</td>';
            } else {
                echo '<td>' . $result[3] . ' °C' .
                '<div style = "width:0px;
                height:0px;
                border-left:25px solid transparent; 
                border-right:25px solid transparent;
                border-bottom:25px solid #F9142C;
                font-size:0px;
                line-height:0px;"> </div>' . '</td>';
            }

            if ($result[4] >= 22 && $result[4] <= 29) {
                echo '<td>' . $result[4] . ' °C' .
                '<div style = "width:0px;
                height:0px;
                border-left:25px solid transparent; 
                border-right:25px solid transparent;
                border-bottom:25px solid #14E633;
                font-size:0px;
                line-height:0px;"> </div>' . '</td>';
            } else {
                echo '<td>' . $result[4] . ' °C' .
                '<div style = "width:0px;
                height:0px;
                border-left:25px solid transparent; 
                border-right:25px solid transparent;
                border-bottom:25px solid #F9142C;
                font-size:0px;
                line-height:0px;"> </div>' . '</td>';
            }
            echo '<td>' . $result[5] . ' °C' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $result[6] . ' °%' . '</td>';
            echo '<td>' . $result[7] . '</td>';
            echo "</tr>";
            echo "<tr>";
        }
        echo "</tr>";
        echo'</tbody>
      </table>';
    }

}

$fecha_prueba = '02-12-18';
?>
