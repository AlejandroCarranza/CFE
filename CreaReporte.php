<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administración de expedientes</title>
	<link rel="stylesheet" type="text/css" href="CSS/Botones.css" />

	<style>
		#botonenviar{
			position: relative;
			left: 200px;
		}
	</style>

</head>
<body>
	<div id="formularioRegistro"></div>
	<form name="formulario" method="post" action="pdf/reporte.php">
		<h2>Seleccione las fechas de las cuales desea generar el reporte</h2>
		<label> <b>Fecha 1</b> </label> <br>
		<input type="date" name="fecha1">
	
		<br>
		<label> <b>Fecha 2</b> </label> <br>
        <input type="date" name="fecha2">
		<br>
		<br>
		<input class="botones" type="submit" value="Crear"/>
	</form>     
</div>
	
</body>
</html>