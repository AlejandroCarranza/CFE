<?php
//Conexion a la base de datos
$conexion = mysql_pconnect("localhost","root","usbw") or die("Ha ocurrido un error en la conexion: ".mysql_error());
mysql_select_db("expedientes") or die(mysql_error());

$RPU = $_POST['rpu'];

//Consulta de insert en la tabla alumnos para guardar registros en alumnos
		$Borrar = mysql_query("DELETE from expedientes where RPU='$RPU' ")
		or die(mysql_error());
        if ($Borrar){
        echo "1";
        }else{
        echo "0";
        }

?>