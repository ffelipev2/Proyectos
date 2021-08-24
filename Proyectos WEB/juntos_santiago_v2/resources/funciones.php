<?php

date_default_timezone_set("Chile/Continental");

class ConneccionMySQL {

// Definicion de atributos
    private $host;
    private $user;
    private $password;
    private $database;
    private $conexion;

    public function __construct() {
//Constructor
        require_once "config.php";
        $this->host = HOST;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->database = DATABASE;
    }

    public function Crearconexion() {
// Metodo que crea y retorna la conexion a la BD.
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conexion->connect_errno) {
            die("Error al conectarse a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error);
        }
    }

    public function Cerrarconexion() {
        $this->conexion->close();
    }

    public function insertar_datos_actividad($clase) {

        $nombre = strtoupper($this->eliminar_acentos($_POST['nombre']));
        $apellidoPaterno = strtoupper($this->eliminar_acentos($_POST['apellidoPaterno']));
        $apellidoMaterno = strtoupper($this->eliminar_acentos($_POST['apellidoMaterno']));
        $pregunta1 = $_POST['pregunta1'];
        $pregunta2 = $_POST['pregunta2'];
        $pregunta3 = $_POST['pregunta3'];
        $pregunta4 = $_POST['pregunta4'];
        $pregunta5 = $_POST['pregunta5'];
        $genero = $_POST['genero'];
        $nacionalidad = $_POST['nacionalidad'];
        $colegio = $_POST['colegio'];
        $curso = $_POST['curso'];
        $hora = date("H:i:s");
        $fecha = date("Y-m-d");

        $consulta = mysqli_query($this->conexion, "SELECT * FROM $clase WHERE nombre = '$nombre' AND apellidoPaterno = '$apellidoPaterno' AND apellidoMaterno = '$apellidoMaterno'");
        if (mysqli_num_rows($consulta) > 0) {
            $sql = "UPDATE $clase SET  nombre = '$nombre', apellidoPaterno ='$apellidoPaterno', apellidoMaterno ='$apellidoMaterno', genero='$genero', nacionalidad='$nacionalidad', respuesta_1 = '$pregunta1', respuesta_2 = '$pregunta2',respuesta_3 = '$pregunta3',respuesta_4 = '$pregunta4', respuesta_5 = '$pregunta5', colegio='$colegio',curso='$curso', fecha = '$fecha', hora = '$hora' WHERE nombre = '$nombre' AND apellidoPaterno = '$apellidoPaterno' AND apellidoMaterno = '$apellidoMaterno';";
            if (mysqli_query($this->conexion, $sql)) {
                echo "<script> alert('Registro actualizado correctamente'); </script>";
            } else {
                echo "Error: 1"; // . $sql . "" . mysqli_error($this->conexion);
            }
        } else {
            $sql = $sql = "INSERT INTO $clase (nombre, apellidoPaterno, apellidoMaterno, genero, nacionalidad, respuesta_1, respuesta_2, respuesta_3, respuesta_4, respuesta_5, colegio, curso, hora, fecha ) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$genero', '$nacionalidad', '$pregunta1', '$pregunta2','$pregunta3','$pregunta4','$pregunta5','$colegio','$curso','$hora','$fecha')";
            if (mysqli_query($this->conexion, $sql)) {
                echo "<script> alert('Registro ingresado correctamente');</script>";
            } else {
                echo "Error: 2"; //. $sql . "" . mysqli_error($this->conexion);
            }
        }
    }

    public function mostrarDatos($tabla) {
        $fecha_hoy = date("d-m-y");
        $consulta = mysqli_query($this->conexion, "SELECT * FROM " . $tabla);
        echo'<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" height ="0%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Genero</th>
                            <th>Nacionalidad</th>
                            <th>Colegio</th>
                            <th>Curso</th>
                            <th>Pregunta 1</th>
                            <th>Pregunta 2</th>
                            <th>Pregunta 3</th>
                            <th>Pregunta 4</th>
                            <th>Puntuación</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
            <tbody>';
        while ($result = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo '<td>' . $result[0] . '</td>';
            echo '<td>' . $result[1] . '</td>';
            echo '<td>' . $result[2] . '</td>';
            echo '<td>' . $result[3] . '</td>';
            echo '<td>' . $result[4] . '</td>';
            echo '<td>' . $result[5] . '</td>';
            echo '<td>' . $result[11] . '</td>';
            echo '<td>' . $result[12] . '</td>';
            echo '<td>' . $result[6] . '</td>';
            echo '<td>' . $result[7] . '</td>';
            echo '<td>' . $result[8] . '</td>';
            echo '<td>' . $result[9] . '</td>';
            echo '<td>' . $result[10] . '</td>';
            echo '<td>' . $result[13] . '</td>';
            echo '<td>' . $result[14] . '</td>';
        }

        echo "</tr>";
        echo'</tbody>
            </table>';
    }

    public function validarUsuario() {
        $usuario = $_POST['username'];
        $pass = $_POST['pass'];
        $sqlQuery = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND pass = '$pass'";
        $consulta = mysqli_query($this->conexion, $sqlQuery);
        $result = mysqli_num_rows($consulta);
        echo $result;
        if ($result > 0) {
            $result = mysqli_fetch_array($consulta);
            if ($result[0] === $usuario && $result[1] === $pass) {
                if ($result[0] == "admin") {
                    session_start();
                    $_SESSION['activo'] = true;
                    header('Location: info.php');
                } else {
                    session_start();
                    $_SESSION['activo'] = true;
                    echo '<script>window.location="info.php";</script>';
                }
            } else {
                echo "<script> alert('Usuario no valido'); </script>";
            }
        } else {
            echo "<script> alert('Revise sus datos nuevamente');</script>";
        }
    }

    function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}
}

?>
