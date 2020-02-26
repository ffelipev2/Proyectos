<?php
$para = 'ffelipev2@gmail.com'; //. ', ';
//$para .= 'correo2@rogerbit.com';
$titulo = 'Movimiento detectado';
$mensaje = 'El sensor PIR ha detectado un movimiento en el lugar';
$cabeceras = 'From: no_responder@rogerbit.com' . "\r\n" .
'Reply-To: no_responder@rogerbit.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($para, $titulo, $mensaje, $cabeceras);
?>