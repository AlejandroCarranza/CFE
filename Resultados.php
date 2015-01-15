<doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/Botones.css" />
		<title>Administración de expedientes</title>

		<script type="text/javascript">
		function muestra_oculta_contrato(id){
		if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
		}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
		muestra_oculta_contrato('mostrarContrato');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
		</script>

		<script type="text/javascript">
		function muestra_oculta_uvie(id){
		if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
		}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
		muestra_oculta_uvie('mostrarUvie');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
		</script>

		<script type="text/javascript">
		function muestra_oculta_solpre(id){
		if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
		}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
		muestra_oculta_solpre('mostrarUvie');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
		</script>


		<script type="text/javascript">
		function muestra_oculta_acreditacion(id){
		if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
		}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
		muestra_oculta_acreditacion('mostrarAcreditacion');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
		</script>

		<script type="text/javascript">
		function muestra_oculta_poder(id){
		if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
		}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
		muestra_oculta_poder('mostrarPoder');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
		</script>

		<script type="text/javascript">
		function muestra_oculta_convenio(id){
		if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
		}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
		muestra_oculta_convenio('mostrarConvenio');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
		</script>
		
		<script type="text/javascript">

function validaForm(){
    // Valida que los Campos de texto esten llenos
    if($("#rpu").val() == ""){
        alert("El campo RPU no puede estar vacío.");
        $("#rpu").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }

        return true; //envia un valor True Si todo está correcto
}
 </script>

		<script>
			$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    			$('#btnEliminar').click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
       			 if(validaForm()){                               // Primero validará el formulario.
           			 $.post("Eliminar.php",$('#formdata').serialize(),function(res){
               			 $('#formularioExp').fadeOut('slow');   // Hacemos desaparecer el div 'formulario' con un efecto fadeOut lento.
               			 if(res == 1){
                 			   $('#exito').delay(500).fadeIn('slow');      // Si hemos tenido éxito, hacemos aparecer el div 'exito' con un efecto fadeIn lento tras un delay de 0,5 segundos.
                			} else {
                    			$('#fracaso').delay(500).fadeIn('slow');    // Si no, lo mismo, pero haremos aparecer el div 'fracaso'
                			}
            			});
        			}
    			});    
			});
		</script>

		<style>
		#btnEliminar{
			position: relative;
			margin-left: 20px;
			top: -195px;
		}
		</style>

	</head>

	<body>
		<div class="titular">
			<h1>Resultado de busqueda</h1>
		</div>

<?php
//Creacion de variables que vamos a usar
$busca="0";
$busca=$_POST['busca'];
$id='0';
//Conexion a la base de datos 
mysql_connect("localhost","root","usbw");
mysql_select_db("expedientes");//nombre de la base de datos
if($busca!=""){
  //Consulta Select que manda llamar los datos correspondientes al la busqueda relizada en el buscador Consuta_E.php
$busqueda=mysql_query("SELECT * FROM EXPEDIENTES WHERE RPU LIKE '".$busca."'");

//Se guarda la busqueda en un arreglo llamado $f para su mejor manejo
while($f=mysql_fetch_array($busqueda)){
	$rpu=$f['RPU'];
	$id=$f['ID'];
//despliegue de la informacion en el formulario
?>

<div id="formularioExp">
        <form method="POST" id="formdata">
            <!-- Muestra los datos de la base de datos en los campos correspondientes -->
            <label>RPU:</label> <input type="text" id="rpu" name="rpu" size="12"  readonly="readonly" value="<?php echo $f['RPU']; ?>" /> <br>
            <label>Nombre:</label> <input type="text" id="nombre" name="nombre" size="70" readonly="readonly" value="<?php echo $f['NOMBRE']; ?>" /> <br>
            <label>Cuenta:</label> <input type="text" id="cuenta" name="cuenta" size="16" readonly="readonly" value="<?php echo $f['CUENTA']; ?>" /> <br>
            <label>Direccion:</label> <input type="text" id="direccion" name="direccion" size="70" readonly="readonly" value="<?php echo $f['DIRECCION']; ?>" /> <br>
            <label>Tarifa:</label> <input type="text" id="tarifa" name="tarifa" size="2" readonly="readonly"value="<?php echo $f['TARIFA']; ?>" /> <br> 
            
            <?php
            if ($f['SUBESTACION']==0) {
			echo '<label>Subestación:</label>','<input size="2" readonly="readonly" value="No">', '<br>';
			}
			else{
			echo '<label>Subestación:</label>','<input size="2" readonly="readonly" value="Si">', '<br>';
			}
		}
	}
            ?>
            <br>
        </form>
    </div>

<a class="botones" href="#" onclick="muestra_oculta_contrato('mostrarContrato')">Contrato</a>
<a class="botones" href="#" onclick="muestra_oculta_uvie('mostrarUvie')">UVIE</a>
<a class="botones" href="#" onclick="muestra_oculta_solpre('mostrarSolpre')">SOLPRE</a>
<a class="botones" href="#" onclick="muestra_oculta_acreditacion('mostrarAcreditacion')">Acreditacíon</a>
<a class="botones" href="#" onclick="muestra_oculta_poder('mostrarPoder')">Poder</a>
<a class="botones" href="#" onclick="muestra_oculta_convenio('mostrarConvenio')">Convenio</a>

<input class="btnRojo" type="button" name="btnEliminar" id="btnEliminar" value="Eliminar">


<div style="display:none" id="mostrarContrato"> 
<?php 
$dir='imagenes/'.$rpu.'/contrato/';  //nombre de la carpeta
$images = glob("$dir{*.gif,*.JPG,*.png, *.jpg}", GLOB_BRACE);  
foreach($images as $v){  
echo '<img src="'.$v.'" border="0" style="width:800px;float:left;margin:10px; href=".$v."/>';  
}  
?> 
</div>

<div style="display:none" id="mostrarUvie"> 
<?php 
$dir='imagenes/'.$rpu.'/uvie/';  //nombre de la carpeta
$images = glob("$dir{*.gif,*.JPG,*.png,*.jpg}", GLOB_BRACE);  
foreach($images as $v){  
echo '<img src="'.$v.'" border="0" style="width:800px;float:left;margin:10px; href=".$v."/>';  
}  
?> 
</div>

<div style="display:none" id="mostrarSolpre"> 
<?php 
$dir='imagenes/'.$rpu.'/solpre/';  //nombre de la carpeta
$images = glob("$dir{*.gif,*.JPG,*.png,*jpg}", GLOB_BRACE);  
foreach($images as $v){  
echo '<img src="'.$v.'" border="0" style="width:800px;float:left;margin:10px; href=".$v."/>';  
}  
?> 
</div>

<div  style="display:none" id="mostrarAcreditacion"> 
<?php 
$dir='imagenes/'.$rpu.'/acreditacion/';  //nombre de la carpeta
$images = glob("$dir{*.gif,*.JPG,*.png,*.jpg}", GLOB_BRACE);  
foreach($images as $v){  
echo '<img src="'.$v.'" border="0" style="width:800px;float:left;margin:10px; href=".$v."/>';  
}  
?> 
</div>

<div  style="display:none" id="mostrarPoder"> 
<?php 
$dir='imagenes/'.$rpu.'/poder/';  //nombre de la carpeta
$images = glob("$dir{*.gif,*.JPG,*.png,*.jpg}", GLOB_BRACE);  
foreach($images as $v){  
echo '<img src="'.$v.'" border="0" style="width:800px;float:left;margin:10px; href=".$v."/>';  
}  
?> 
</div>

<div  style="display:none" id="mostrarConvenio"> 
<?php 
$dir='imagenes/'.$rpu.'/convenio/';  //nombre de la carpeta
$images = glob("$dir{*.gif,*.JPG,*.png,*.jpg}", GLOB_BRACE);  
foreach($images as $v){  
echo '<img src="'.$v.'" border="0" style="width:800px;float:left;margin:10px; href=".$v."/>';  
}  
?> 
</div>

		<div id="exito" style="display:none">
            Registro Eliminado. 
        </div>
        <div id="fracaso" style="display:none">
            Se ha producido un error.
        </div>
	</body>

</html>
