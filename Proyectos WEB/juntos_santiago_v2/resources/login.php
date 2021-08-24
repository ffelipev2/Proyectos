<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Resultados</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin"  action="" method="post">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus name="username">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="pass">
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="enviar" >Enviar</button>
                </form>
            </div>
        </div>
    </body>
    <?php
    require_once "funciones.php";
    $conn = new ConneccionMySQL();
    $conn->Crearconexion();
    if (isset($_POST['enviar'])) {
        $conn->validarUsuario();
    }
    $conn->Cerrarconexion();
    ?>
</html>                                		                            