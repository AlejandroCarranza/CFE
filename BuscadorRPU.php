<doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/Botones.css" />
	    <script type="text/javascript" src="Scripts/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="Scripts/AJAX.js"></script>
		<title>Administración de expedientes</title>

		<!-- Envia el contenido del formulario al archivo Resultados.php y se carga el contenido en el div Pagina todo esto al dar clic en el boton buscar -->
		<script type="text/javascript">
		$(document).ready(function() {
   		$('#Buscar').click(function(){
     	$.post(
	    "Resultados.php", $("#cdr").serialize(),function(a){
                $('#Pagina').html(a);
	    });
   });
});
</script>

	</head>

	<body>
		<div class="titular">
		<h2>Busqueda de expedientes</h2>
		</div>
		<form name="form1" method="post" id="cdr" >	
			<Label id="buscarA">Ingrese el RPU:</Label>
			<input name="busca" size="12"  id="busca" type="text" maxlength="12">
			<a id="Buscar" class="botones"> Buscar</a>
		</form>

	</body>

</html>
