<?PHP
$conn = mysqli_connect("201.148.104.42", "titanxcl_felipe", "arduino123456", "titanxcl_plantas");
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
if (isset($_POST['ingresar'])) {
    $usuario = $_POST['username'];
    $pass = $_POST['pass'];
    session_start();
    $_SESSION['activo'] = true;
    $sqlQuery = "SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Pass = '$pass'";
    $consulta = mysqli_query($conn, $sqlQuery);
    $result = mysqli_num_rows($consulta);
    if ($result > 0) {
        $result = mysqli_fetch_array($consulta);
        if ($result[1] === $usuario && $result[3] === $pass) {

            echo '<script>window.location="https://titanx.cl/plantas/pages/plantas.php";</script>';
        } else {
            echo "<script> sweetAlert({title: 'Error!',text: 'Usuario no válido',type: 'error'}); </script>";
        }
    } else {
        echo "<script> sweetAlert({title: 'Error!',text: 'Revise los datos nuevamente',type: 'error'},function () {window.location.href = './index.php';}); </script>";
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Acceso Plantas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/planta.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- sweet alert -->
        <link href="js/bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap-sweetalert-master/dist/sweetalert.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action ="">
                        <span class="login100-form-title">
                            TitanX
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input class="input100" type="text" name="username" placeholder="Usuario">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                            <input class="input100" type="password" name="pass" placeholder="Contraseña">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="text-right p-t-13 p-b-23">
                            <span class="txt1">
                                Olvidaste
                            </span>

                            <a href="#" class="txt2">
                                Usuario / Contraseña?
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="ingresar" >
                                Sign in
                            </button>
                        </div>

                        <div class="flex-col-c p-t-170 p-b-40">
                            <span class="txt1 p-b-9">
                                ¿No tienes una cuenta?
                            </span>

                            <a href="#" class="txt3">
                                Registrate ahora
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
    </body>
</html>

