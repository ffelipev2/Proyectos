<!-- Evaluar que la sesión continue, verificando la variable de sesión creada para este propósito.
        Si la variable cambió su valor inicial se enviará la variable error=si al archivo salir.php -->
<?php
session_start();
if ($_SESSION["activo"]!=true) {
	//echo '<script>window.location="https://titanx.cl";</script>';
        header("Location:../../resources/salir.php?sal=si");
}
?>