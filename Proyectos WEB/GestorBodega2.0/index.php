<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ingreso de usuario</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/theme.blue.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>

        <!-- SWEET ALERT *****************************************************-->
        <script src="bootstrap-sweetalert-master/dist/sweetalert.min.js" type="text/javascript"></script>
        <link href="bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css"/>


    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong> BIENVENIDOS AL GESTOR DE BODEGA </strong></h1>
                            <div class="description">
                                <p>
                                    Por favor ingresa tus datos 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Inicio de sesión</h3>
                                    <p>Escribe tu usuario y contraseña:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>       
                                        <input type="text" id="rut" name="usuario" required oninput="checkRut(this)"class="form-username form-control" placeholder="Ingrese RUT">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" name="ingresar" class="btn">Ingresar!</button>
                                    <script src="js/validarRUT.js" type="text/javascript"></script>
                                </form>
                            </div>

                            <?php
                            require_once "modelo/modelo.php";
                            $db = new BaseDatos();
                            $db->conectar();
                            if (isset($_POST['ingresar'])) {
                            $db->validarUsuario();
                            }
                            $db->desconectar();
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <script src = "assets/js/jquery-1.11.1.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/jquery.backstretch.min.js"></script>
            <script src="assets/js/scripts.js"></script>
    </body>

</html>