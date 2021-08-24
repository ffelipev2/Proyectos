<?php

ob_start();
session_start();
//database credentials
/*
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', '');
  define('DBNAME', 'bd_juntos_santiago');
*/


define('DBHOST', '201.148.104.42');
define('DBUSER', 'titanxcl_felipe');
define('DBPASS', 'arduino123456');
define('DBNAME', 'titanxcl_loginphp');

//aplication address
define('DIR', 'https://titanx.cl/juntos_santiago_v2/'); //CAMBIAR SEGUN SERVIDOR
define('SITEEMAIL', 'noreply@domain.com');

try {

    //create PDO connection
    $db = new PDO("mysql:host=" . DBHOST . ";charset=utf8mb4;dbname=" . DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    //show error
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}

//include the user class, pass in the database connection
include('user.php');
include('phpmailer/mail.php');
$user = new User($db);
?>
