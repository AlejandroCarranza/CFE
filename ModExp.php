<?php
//Conexion a la base de datos
$conexion = mysql_pconnect("localhost","root","usbw") or die("Ha ocurrido un error en la conexion: ".mysql_error());
mysql_select_db("expedientes") or die(mysql_error());

$RPU = $_POST['rpu'];
$Nombre = $_POST['nombre'];
$Cuenta = $_POST['cuenta'];

$Direccion = $_POST['direccion'];
$Tarifa = $_POST['tarifa'];
$Subestacion = $_POST['subestacion'];

//Consulta de insert en la tabla alumnos para guardar registros en alumnos
		$Actualizar = mysql_query("UPDATE expedientes SET NOMBRE = '$Nombre', CUENTA = '$Cuenta', 
			DIRECCION = '$Direccion', TARIFA = '$Tarifa', SUBESTACION = '$Subestacion' WHERE RPU='$RPU' ")
		or die(mysql_error());
        if ($Actualizar){
        echo "1";
        }else{
        echo "0";
        }

?>