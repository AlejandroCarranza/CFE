
//parámetro1 = métodd (POST, GET)
//parámetro2 = ID del elemento donde se va a cargar la información
//parámetro3: nombre de la página a cargar con todo y extensión
//parámetro4 = datos o parámetros con for
				//p1=v1&p2=v2&p3=v3
//parámtro5: opcional: HTML a mostrar mintras se carga la página
function ajaxform()
{
	var args = ajaxform.arguments;
	var x = (window.ActiveXObject) ? new ActiveXObject ("Microsoft.XMLHTTP"): new XMLHttpRequest();
	m=(args[0]=='')?'GET':args[0];
		var doc = document.getElementById(args[1]);
			doc.innerHTML = (args[4]!=undefined ) ? args[4] : '<h3>Cargando pagina...</h3>';
		x.onreadystatechange = function()
		{
			if (x.readyState == 4 && x.status == 200) {
				results = x.responseText;
				doc.innerHTML = results;
				//fun();
			}
		}
			x.open(m, args[2], true);
			x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			x.send(args[3]);
}