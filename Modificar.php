
<?php
//Conexion a la base de datos
$conexion = mysql_pconnect("localhost","root","usbw") or die("Ha ocurrido un error en la conexion: ".mysql_error());
mysql_select_db("expedientes") or die(mysql_error());

$busca="0";
$busca=$_POST['busca'];
header('Content-Type: text/html; charset=UTF-8');

//Consulta select para seleccionar los campos de la tabla segun un ID
$busqueda=mysql_query("SELECT * FROM EXPEDIENTES WHERE RPU LIKE '".$busca."'");
$row = mysql_fetch_array($busqueda);

?>
<html>
    <head>

      <!-- Importación de librerias -->
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="CSS/Botones.css" />
        <script type="text/javascript" src="Scripts/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="Scripts/AJAX.js"></script>
  
        <title> </title>
        
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
        if(validaForm()){                               // Primero validará el formulario.
            $.post("ModExp.php",$('#formdata').serialize(),function(res){
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
    </head>

<!-- Contenido general de la página -->
    <body>
      <div id="formularioExp">
        <form method="POST" id="formdata">
        	<h2>Modifica los campos que desees</h2>
            <!-- Muestra los datos de la base de datos en los campos correspondientes -->
            <label>RPU:</label> <input type="text" id="rpu" name="rpu" size="12"  readonly="readonly" value="<?php echo $row['RPU']; ?>" /> <br>
            <label>Nombre:</label> <input type="text" id="nombre" name="nombre" size="70" value="<?php echo $row['NOMBRE']; ?>" /> <br>
            <label>Cuenta:</label> <input type="text" id="cuenta" name="cuenta" size="16" value="<?php echo $row['CUENTA']; ?>" /> <br>
            <label>Direccion:</label> <input type="text" id="direccion" name="direccion" size="70" value="<?php echo $row['DIRECCION']; ?>" /> <br>
            
            <?php
            if ($row['TARIFA']=="OM") {
            echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM" selected>OM</OPTION>
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
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="HM") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM" selected>HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION>
                    <OPTION VALUE="06">06</OPTION>  
                    <OPTION VALUE="07">07</OPTION>  
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION> 
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="9M") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M"selected>9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION> 
                    <OPTION VALUE="06">06</OPTION> 
                    <OPTION VALUE="07">07</OPTION>  
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION> 
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="9C") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M"d>9M</OPTION> 
                    <OPTION VALUE="9C" selecte>9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION>
                    <OPTION VALUE="06">06</OPTION>  
                    <OPTION VALUE="07">07</OPTION>  
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION> 
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="5A") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A"selected>5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION>
                    <OPTION VALUE="06">06</OPTION>  
                    <OPTION VALUE="07">07</OPTION>  
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION> 
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="01") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01"selected>01</OPTION> 
                    <OPTION VALUE="02">02</OPTION> 
                    <OPTION VALUE="06">06</OPTION> 
                    <OPTION VALUE="07">07</OPTION> 
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION>  
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="02") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02"selected>02</OPTION> 
                    <OPTION VALUE="06">06</OPTION> 
                    <OPTION VALUE="07">07</OPTION>
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION>   
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="06") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION>
                    <OPTION VALUE="06" selected>06</OPTION>   
                    <OPTION VALUE="07">07</OPTION>
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION>   
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="07") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION> 
                    <OPTION VALUE="06">06</OPTION> 
                    <OPTION VALUE="07"selected>07</OPTION> 
                    <OPTION VALUE="66">66</OPTION> 
                    <OPTION VALUE="76">76</OPTION> 
                    </SELECT>', '<br>';
            }
            elseif ($row['TARIFA']=="66") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION> 
                    <OPTION VALUE="06">06</OPTION> 
                    <OPTION VALUE="07">07</OPTION>
                    <OPTION VALUE="66" selected>66</OPTION> 
                    <OPTION VALUE="76">76</OPTION>  
                    </SELECT>', '<br>';

            }elseif ($row['TARIFA']=="76") {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE="OM">OM</OPTION>
                    <OPTION VALUE="HM">HM</OPTION>
                    <OPTION VALUE="9M">9M</OPTION> 
                    <OPTION VALUE="9C">9C</OPTION> 
                    <OPTION VALUE="5A">5A</OPTION> 
                    <OPTION VALUE="01">01</OPTION> 
                    <OPTION VALUE="02">02</OPTION> 
                    <OPTION VALUE="06">06</OPTION> 
                    <OPTION VALUE="07">07</OPTION>
                    <OPTION VALUE="66" >66</OPTION> 
                    <OPTION VALUE="76" selected>76</OPTION>  
                    </SELECT>', '<br>';

            }else {
                echo '<label>Tarifa:</label>','<SELECT name="tarifa" SIZE="1"> 
                    <OPTION VALUE=""></OPTION>
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
                    </SELECT>', '<br>';
            }



            
            if ($row['SUBESTACION']==0) {
            echo '<label>Subestación:</label>','<SELECT name="subestacion" SIZE="1"> 
                    <OPTION VALUE="0" selected>No</OPTION>
                    <OPTION VALUE="1">Sí</OPTION> 
                    </SELECT>', '<br>';
            }
            else{
                echo '<label>Subestación:</label>','<SELECT name="subestacion" SIZE="1"> 
                        <OPTION VALUE="0">No</OPTION>
                        <OPTION VALUE="1" selected>Sí</OPTION> 
                         </SELECT>', '<br>';
            }
            ?>
            
             <br>
            <input class="botones" type="button" name="botonenviar" id="botonenviar" value="Modificar">         
            <br>
        </form>
    </div>
        
       <div id="exito" style="display:none">
            Sus datos han sido recibidos con éxito. 
        </div>
        <div id="fracaso" style="display:none">
            Se ha producido un error durante el envío de datos.
        </div>
    </body>

</html>
