<?php
//Conexion a la base de datos
$conexion = mysql_connect("localhost","root","usbw") or die("Ha ocurrido un error en la conexion: ".mysql_error());
mysql_select_db("expedientes") or die(mysql_error());


//Creacion de variables que reciben los valores enviados desde el formulario Insertar_Alumno.php
$RPU = $_POST['rpu'];
$Nombre = $_POST['nombre'];
$Cuenta = $_POST['cuenta'];

$Direccion = $_POST['direccion'];
$Tarifa = $_POST['tarifa'];
$Subestacion = $_POST['subestacion'];
$Fecha = $_POST['fecha'];



//Consulta de insert en la tabla alumnos para guardar registros en alumnos
		$Insertar = mysql_query("insert into expedientes (RPU, NOMBRE, CUENTA, DIRECCION, TARIFA, SUBESTACION, FECHA)
		VALUES('$RPU', '$Nombre', '$Cuenta', '$Direccion', '$Tarifa', '$Subestacion', '$Fecha')")
		or die(mysql_error());
        if ($Insertar){
        echo "1";
        }else{
        echo "0";
        }

?>