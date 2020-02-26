<?php

require_once "config.php";
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);

class BaseDatos {

    protected $conexion;
    protected $db;

    public function conectar() {
        $this->conexion = mysql_connect(HOST, USER, PASS);
        if ($this->conexion == 0)
            DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        //echo 'error 1';
        $this->db = mysql_select_db(DBNAME, $this->conexion);
        if ($this->db == 0)
            DIE("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);
        //echo 'error 2';
        return true;
    }

    public function desconectar() {
        mysql_close($this->conexion);
    }

    public function enviarDatosPersona() {
        mysql_set_charset('utf8');
        $sql = "SELECT rut, nombre, apellido,cargo FROM personal";
        $ejecutar = mysql_query($sql, $this->conexion);
        echo'<table id="Personas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($result = mysql_fetch_array($ejecutar)) {
            echo "<tr>";
            echo '<td>' . $result['rut'] . '</td>';
            echo '<td>' . $result['nombre'] . '</td>';
            echo '<td>' . $result['apellido'] . '</td>';
            echo '<td>' . $result['cargo'] . '</td>';
            echo "</tr>";
        }
        echo'</tbody>
            </table>';
    }

    public function validarUsuario() {

        mysql_set_charset('utf8');
        $usuario = $_POST['usuario'];
        $pass = md5($_POST['pass']);
        $consulta = "SELECT * FROM personal WHERE rut = '$usuario' AND contraseña = '$pass' ";
        $ejecutar = mysql_query($consulta, $this->conexion);
        $resul = mysql_num_rows($ejecutar);
        if ($resul > 0) {
            $resul = mysql_fetch_array($ejecutar);
            session_start();
            $_SESSION['activo'] = true;
            $_SESSION['usuario'] = $resul['nombre'] . ' ' . $resul['apellido'];
            $_SESSION['cargo'] = $resul['cargo'];
            if ($resul['cargo'] == "Administrador") {
                header("Location:./MenuPrincipalAdmin.php");
            }
            if ($resul['cargo'] == "Bodeguero") {
                header("Location:./MenuPrincipalBodega.php");
            }
        } else {
            echo "<script> sweetAlert({title: 'Error!',text: 'Revise los datos nuevamente',type: 'error'},function () {window.location.href = './index.php';}); </script>";

        }
    }

    public function modificarPersonal() {
        $seleccionar = $_POST['seleccionar'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cargo = $_POST['cargo'];
        if ($seleccionar == '17579474-3') {
            //echo "<div class='alert alert-danger'> <strong>Danger!</strong> Indicates a dangerous or potentially negative action.</div>";
            echo "<script> sweetAlert({title: 'Error!',text: 'Admin general no puede ser modificado',type: 'error'},function () {window.location.href = './ModificarPersonal.php';}); </script>";
            //echo "<script lenguaje='javascript'>alert('Admin general no puede ser modificado');window.location='./ModificarPersonal.php';</script>";
        } else {
            $rut = $_POST['seleccionar'];
            $consulta = "SELECT * FROM personal WHERE rut = '$rut'";
            $ejecutar = mysql_query($consulta, $this->conexion);
            $resul = mysql_num_rows($ejecutar);
            if ($resul > 0) {
                $resul = mysql_fetch_array($ejecutar);
                $upde = "UPDATE personal SET nombre = '$nombre', apellido = '$apellido', cargo = '$cargo' WHERE rut = '$rut'";
                mysql_query($upde, $this->conexion);
                echo "<script> sweetAlert({title: 'Correcto!',text: 'El registro se ha modificado correctamente',type: 'success'},function () {window.location.href = './ModificarPersonal.php';}); </script>";
                //echo "<script>alert('El registro se ha modificado correctamente'); window.location='./ModificarPersonal.php'; </script>";
            } else {
                echo "<script> sweetAlert({title: 'Error!',text: 'Revise los datos nuevamente',type: 'error'}, function () {window.location.href = './ModificarPersonal.php';}); </script>";
                //echo "<script>alert('Error! Revise los datos nuevamente'); window.location='./ModificarPersonal.php'; </script>";
            }
        }
    }

    public function eliminarPersonal() {

        $rut = $_POST['eliminar-personal'];
        if ($rut == '17579474-3') {
            echo "<script> sweetAlert({title: 'Error!',text: 'Admin general no puede ser eliminado',type: 'error'},function () {window.location.href = './EliminarPersonal.php';}); </script>";
            //echo "<script lenguaje='javascript'>alert('Admin general no puede ser eliminado');</script>";
        } else {
            $consulta = "SELECT * FROM personal WHERE rut = '$rut'";
            $ejecutar = mysql_query($consulta, $this->conexion);
            $resul = mysql_num_rows($ejecutar);
            if ($resul > 0) {
                $resul = mysql_fetch_array($ejecutar);
                $del = "DELETE FROM personal WHERE rut = '$rut'";
                mysql_query($del, $this->conexion);
                echo "<script> sweetAlert({title: 'Correcto!',text: 'El registro se ha eliminado correctamente',type: 'success'},function () {window.location.href = './EliminarPersonal.php';}); </script>";
                //echo"<script>alert('El registro se ha eliminado correctamente'); window.location='EliminarPersonal'; </script>";
            } else {
                echo "<script> sweetAlert({title: 'Error!',text: 'Revise los datos y vuelva a intentarlo',type: 'error'},function () {window.location.href = './EliminarPersonal.php';}); </script>";
                //echo"<script>alert('Error: revise los datos y vuelva a intentarlo'); window.location='EliminarPersonal'; </script>";
            }
        }
    }

    public function agregarPersonal() {

        if ($_POST['pass1'] == $_POST['pass2']) {
            $rut = $_POST['seleccionar'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cargo = $_POST['cargo'];
            $contraseña = md5($_POST['pass1']);

            $consulta = "SELECT * FROM personal WHERE rut = '$rut'";
            $ejecutar = mysql_query($consulta, $this->conexion);
            $resul = mysql_num_rows($ejecutar);

            if ($resul > 0) {
                echo "<script> sweetAlert({title: 'Error!',text: 'Ya existe un registro asociado a este rut',type: 'error'},function () {window.location.href = './AgregarPersonal.php';}); </script>";
            } else {
                $consulta = "INSERT INTO personal (rut, nombre, apellido, cargo, contraseña) VALUES ('$rut', '$nombre', '$apellido', '$cargo', '$contraseña')";
                $ejecutar = mysql_query($consulta, $this->conexion) or die("No se pudo crear el registro");
                echo "<script> sweetAlert({title: 'Correcto!',text: 'El registro se ha agregado correctamente',type: 'success'},function () {window.location.href = './AgregarPersonal.php';}); </script>";
            }
        } else {
            echo "<script> sweetAlert({title: 'Error!',text: 'Las contraseñas no coinciden, vuelva a intentarlo',type: 'error'},function () {window.location.href = './AgregarPersonal.php';}); </script>";
        }
    }

    public function listaryExportar() {
        mysql_set_charset('utf8');
        $sql = "SELECT cod_producto, descripcion, stock,proveedor,fecha_ingreso FROM productos";
        $ejecutar = mysql_query($sql, $this->conexion);
        echo'<table id="Personas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <th>Proveedor</th>
                            <th>Fecha de ingreso</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($result = mysql_fetch_array($ejecutar)) {
            echo "<tr>";
            echo '<td>' . $result['cod_producto'] . '</td>';
            echo '<td>' . $result['descripcion'] . '</td>';
            echo '<td>' . $result['stock'] . '</td>';
            echo '<td>' . $result['proveedor'] . '</td>';
            echo '<td>' . $result['fecha_ingreso'] . '</td>';
            echo "</tr>";
        }
        echo'</tbody>
            </table>';
    }

    public function agregarProducto() {
        $cod = $_POST['codigo'];
        $desc = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $prov = $_POST['proveedor'];
        $fecha = $_POST['fecha'];
        $sql = "SELECT * FROM productos WHERE cod_producto = '$cod'";
        $ejecutar = mysql_query($sql, $this->conexion);
        $resul = mysql_num_rows($ejecutar);

        if ($resul > 0) {
            echo "<script> sweetAlert({title: 'Error!',text: 'Ya existe este codigo en el sistema',type: 'error'},function () {window.location.href = './ListaryExportar.php';}); </script>";
        } else {
            $inser = "INSERT INTO productos(cod_producto, descripcion, stock, proveedor, fecha_ingreso)VALUES('$cod','$desc','$stock','$prov','$fecha') ";
            mysql_query($inser, $this->conexion);
            echo "<script> sweetAlert({title: 'Correcto!',text: 'Los datos se ingresaron correctamente',type: 'success'},function () {window.location.href = './ListaryExportar.php';}); </script>";
        }
    }

    public function modificarProducto() {
        $stock = $_POST['stock'];
        $cod = $_POST['codigo']; //contiene el codigo
        $consulta = "SELECT * FROM productos WHERE cod_producto = '$cod'";
        $ejecutar = mysql_query($consulta, $this->conexion);
        $resul = mysql_num_rows($ejecutar);
        if ($stock == 0) {
            echo "<script> sweetAlert({title: 'Atención!',text: 'No se han hecho cambios en el stock!',type: 'warning'},function () {window.location.href = './ModificarProducto.php';}); </script>";
        } else {
            if ($resul > 0) {
                $resul = mysql_fetch_array($ejecutar);
                $stockinicial = $resul['stock'];
                $var = $resul['stock'] + $stock;
                if ($var < 0) {
                    echo "<script> sweetAlert({title: 'Error!',text: 'No puede quedar con stock menor a 0',type: 'error'},function () {window.location.href = './ModificarProducto.php';}); </script>";
                } else {
                    $upde = "UPDATE productos SET stock = '$var' WHERE cod_producto='$cod'";
                    mysql_query($upde, $this->conexion);
                    echo "<script> sweetAlert({title: 'Correcto!',text: 'Se ha modificado el stock del producto',type: 'success'},function () {window.location.href = './ModificarProducto.php';}); </script>";
                }
            } else {
                echo "<script> sweetAlert({title: 'Error!',text: 'Revise los datos y vuelva a intentarlo',type: 'error'},function () {window.location.href = './ModificarProducto.php';}); </script>";
            }
        }
    }

    public function eliminarProducto() {
        $eli = $_POST['codigoproducto']; //contiene el codigo ingresado por pantalla 
        $consulta = "SELECT * FROM productos WHERE cod_producto = '$eli'";
        $ejecutar = mysql_query($consulta, $this->conexion);
        $resul = mysql_num_rows($ejecutar);
        var_dump($resul);
        if ($resul > 0) {
            $del = "DELETE FROM productos WHERE cod_producto = '$eli'";
            mysql_query($del, $this->conexion);
            echo "<script> sweetAlert({title: 'Correcto!',text: 'Se ha eliminado el producto correctamente',type: 'success'},function () {window.location.href = './EliminarProducto.php';}); </script>";
        } else {
            echo "<script> sweetAlert({title: 'Error!',text: 'No se encontro el producto',type: 'error'},function () {window.location.href = './EliminarProducto.php';}); </script>";

        }
    }

}

/*
  CREATE TABLE alumnos
  (
  Codigo int NOT NULL AUTO_INCREMENT,
  Nombre varchar(255) NOT NULL,
  Apellido varchar(255),
  Rut varchar(255),
  Sexo varchar(255),
  Numero varchar(255),
  PRIMARY KEY (Codigo)
  )
 */
?>