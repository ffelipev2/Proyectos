
<?php

/*
/* http://localhost/prueba_1/get_prueba/insert_get.php?password=123&mac=54-13-79-0E-C8-F7&temperatura=20&humedad1=30&humedad2=33%
   http://localhost/plantas/get_prueba/insert_get.php?password=123&mac=54-13-79-0E-C8-F7&temperatura=20&humedad1=30&humedad2=33
   http://titanx.cl/plantas/get_prueba/insert_get.php?password=123&mac=30:AE:A4:F4:11:DC&temperatura=20&humedad1=30&humedad2=33
 *  */

/*
  CREATE TABLE datos_planta_3
  (mac VARCHAR(255),
  temperatura VARCHAR(255),
  humedad1 VARCHAR(255),
  humedad2 VARCHAR(255),
  fecha VARCHAR(255),
  hora VARCHAR(255));
 */
date_default_timezone_set("Chile/Continental");
require_once "../pages/modelo.php";


//$mysqli = new mysqli("localhost", "root", "123", "plantasp_1")or die('Error al conectar' . mysqli_errno($mysqli));
//$mysqli = new mysqli("localhost", "plantasp_felipe", "arduino123456", "plantasp_1");
$mysqli = new mysqli("201.148.104.42", "titanxcl_felipe", "arduino123456", "titanxcl_plantas") or die('Error al conectar' . mysqli_errno($mysqli));


$mac_aparato_1 = '30:AE:A4:F4:11:DC'; // ---OK 
$mac_aparato_2 = '30:AE:A4:F3:3D:D0'; // ---OK 
$mac_aparato_3 = '30:AE:A4:F4:BF:B0'; // ---OK
$mac_aparato_4 = '30:AE:A4:F4:BF:B0'; // ---
$mac_aparato_5 = '30:AE:A4:F3:48:BC'; // -- 
$mac_aparato_6 = '30:AE:A4:F4:1C:3C'; // -- 
$mac_aparato_7 = '30:AE:A4:FE:70:7C'; // -- 
$mac_aparato_8 = '30:AE:A4:F3:41:10'; // -- 
$mac_aparato_9 = '30:AE:A4:F3:42:D0'; // -- 
$mac_aparato_10 = '30:AE:A4:F3:49:C4'; // -- OK 


$pass = $_GET['password'];
$mac = $_GET['mac'];
$temperatura = $_GET['temperatura'];
$humedad1 = $_GET['humedad1'];
$humedad2 = $_GET['humedad2'];
$temp_1 = $_GET['temperatura1'];
$temp_2 = $_GET['temperatura2'];
$temp_3 = $_GET['temperatura3'];
$temp_4 = $_GET['temperatura4'];
$hume_1 = $_GET['humedad1'];
$fecha = date("d-m-y");
$hora = date("H:i:s");

echo $humedad1 . $humedad2 . $temperatura;


if ($pass == '123' && $mac == $mac_aparato_1) {
    $insertar = "INSERT INTO datos_planta_1(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
    echo "Planta 1";
} else if ($pass == '123' && $mac == $mac_aparato_2) {
    $insertar = "INSERT INTO datos_planta_2(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_3) {
    $insertar = "INSERT INTO datos_planta_3(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_4) {
    $insertar = "INSERT INTO datos_planta_4(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_5) {
    $insertar = "INSERT INTO datos_planta_5(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_6) {
    $insertar = "INSERT INTO datos_planta_6(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_7) {
    $insertar = "INSERT INTO datos_planta_7(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_8) {
    $insertar = "INSERT INTO datos_planta_8(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_9) {
    $insertar = "INSERT INTO datos_planta_9(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else if ($pass == '123' && $mac == $mac_aparato_10) {
    $insertar = "INSERT INTO datos_planta_10(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
    $mysqli->query($insertar);
    $mysqli->close();
    echo "OK";
} else {
    echo "Error";
}

/*
  // fecha y hora
  if ($pass == '123' && $mac == $mac_aparato_1) {
  $insertar = "INSERT INTO datos_planta_1(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
  $mysqli->query($insertar);
  $mysqli->close();
  } else if ($pass == '123' && $mac == $mac_aparato_2) {
  $insertar = "INSERT INTO datos_planta_2(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
  $mysqli->query($insertar);
  $mysqli->close();
  } else if ($pass == '123' && $mac == $mac_aparato_3) {
  $insertar = "INSERT INTO datos_planta_3(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
  $mysqli->query($insertar);
  $mysqli->close();
  } else if ($pass == '123' && $mac == $mac_aparato_4) {
  $insertar = "INSERT INTO datos_planta_4(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
  $mysqli->query($insertar);
  $mysqli->close();
  } else if ($pass == '123' && $mac == $mac_aparato_4) {
  $insertar = "INSERT INTO datos_planta_4(mac, temperatura, humedad1, humedad2, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
  $mysqli->query($insertar);
  $mysqli->close();
  } else if ($pass == '1234' && $mac == $mac_aparato_5) {
  $insertar = "INSERT INTO temp_acuario(mac, temp_1, temp_2, temp_3, fecha, hora) VALUES ('$mac','$temperatura','$humedad1','$humedad2','$fecha','$hora')";
  $mysqli->query($insertar);
  $mysqli->close();
  } else {
  $mysqli->close();
  echo "Error";
  }
*/

?>
