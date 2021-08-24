<?php
require_once('config.php');
if (isset($_POST['param'])) {
    $codigoE = $_POST['param'];
    $user->cargarEstablecimientos($codigoE);
}
?>