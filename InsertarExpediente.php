<doctype html>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/Botones.css" />
        <script type="text/javascript" src="Scripts/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="Scripts/AJAX.js"></script>
        <title>Administración de expedientes</title>

        <script type="text/javascript">

function validaForm(){
    // Valida que los Campos de texto esten llenos
    if($("#rpu").val() == ""){
        alert("El campo RPU no puede estar vacío.");
        $("#rpu").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#cuenta").val() == ""){
        alert("El campo Cuenta no puede estar vacío.");
        $("#cuenta").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#direccion").val() == ""){
        alert("El campo Dirección no puede estar vacío.");
        $("#direccion").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#tarifa").val() == ""){
        alert("El campo Tarifa no puede estar vacío.");
        $("#tarifa").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }

        return true; //envia un valor True Si todo está correcto
}
 </script>


<script>
$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $('#botonenviar').click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(validaForm(formularioRegistro)){                               // Primero validará el formulario.
            $.post("Insertar.php",$('#formdata').serialize(),function(res){
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

	</head>

	<body>
        <div class="titulo">
        <h2>Insertar Expediente</h2>
        </div>

<div id="formularioRegistro">
  <form id="formdata" method="POST" enctype="multipart/form-data">

       <label>RPU:</label>  
       <input type="text" id="rpu" name="rpu" size="12" maxlength="12" />
       <br>

       <label>Nombre:</label>  
       <input type="text" id="nombre" name="nombre" size="50" maxlength="50" />
       <br>

       <label>Cuenta:</label>  
       <input type="text" id="cuenta" name="cuenta" size="16" maxlength="16"/>
       <br>

       <label>Dirección:</label>  
       <input type="text" id="direccion" name="direccion" size="50" maxlength="50"/>
       <br>

        <!-- <label>Tarifa:</label>  
        <input type="text" id="tarifa" name="tarifa" size="2" maxlength="2" />
        <br> -->

        <label>Tarifa:</label>  
        <SELECT name="tarifa" SIZE="1"> 
                            <OPTION VALUE="OM">OM</OPTION>
                            <OPTION VALUE="HM">HM</OPTION>
                            <OPTION VALUE="9M">9M</OPTION> 
                            <OPTION VALUE="9C">9C</OPTION> 
                            <OPTION VALUE="5A">5A</OPTION> 
                            <OPTION VALUE="01">01</OPTION> 
                            <OPTION VALUE="02">02</OPTION>
                            <OPTION VALUE="06">06</OPTION>  
                            <OPTION VALUE="07">07</OPTION>
                            <OPTION VALUE="66">66</OPTION> 
                            <OPTION VALUE="76">76</OPTION>   
                            </SELECT>
        <br>

        <label>Subestación:</label>  
        <SELECT name="subestacion" SIZE="1"> 
                            <OPTION VALUE="0">No</OPTION>
                            <OPTION VALUE="1">Sí</OPTION> 
                            </SELECT>
        <br> 
        <label>Fecha de registro:</label> 
        <input name="fecha" type="date" id="fecha" />
        <br>
        <input class="botones" type="button" name="botonenviar" id="botonenviar" value="Agregar">
    
  </form>
</div>

        <!-- Divs que contienen las respuestas al envio de los datos -->
            <div id="exito" style="display:none">
            Sus datos han sido recibidos con éxito.
        </div>
        <div id="fracaso" style="display:none">
            Se ha producido un error durante el envío de datos.
        </div>
	</body>

</html>
