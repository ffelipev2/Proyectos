<?php
if ($_GET['sal'] == 'si') {
    session_start();
    session_destroy();
    header('Location: ../pages/admin/login.php');
}
if ($_GET['sal'] == 'sipsu') {
    session_start();
    session_destroy();
    header('Location: ../pages2/index.php');
}
?>