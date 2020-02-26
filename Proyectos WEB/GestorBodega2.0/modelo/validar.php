
<?php
require "modelo.php";
$db = new BaseDatos();
$db->conectar();
$db->validarUsuario();
$db->desconectar();

?>