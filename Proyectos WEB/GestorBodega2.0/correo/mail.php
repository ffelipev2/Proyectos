<?php
$para = 'ffelipev2@gmail.com'; //. ', ';
//$para .= 'correo2@rogerbit.com';
$titulo = 'Movimiento detectado';
$mensaje = 'Una de las puertas ha sido abierta.';
$cabeceras = 'From: Alarma_@arduino.com' . "\r\n" .
'Reply-To: Alarma_@arduino.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($para, $titulo, $mensaje, $cabeceras);
?>