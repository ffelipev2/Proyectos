<?php
if ($_GET['sal'] == 'si') {
    session_start();
    session_destroy();
    echo '<script>window.location="https://titanx.cl";</script>';
}
?>