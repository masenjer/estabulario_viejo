function MostraFitxaNewJaulasAnim(id)
{
	$("#DIVNewJaulasAnim").fadeIn("slow");	
	OmpleEspecies(0,'NewJaulasAnim');
	$("#Cepa0NewJaulasAnim").html("");
	$("#CantidadNewJaulasAnim").val("");
	$("#RatonIDNewJaulasAnim").val("");
	
	document.getElementById("SaveNewJaulasAnim").onclick = function (){SaveNewJaulasAnim(id);};
}

function TancaFitxaNewJaulasAnim()
{
	$("#DIVNewJaulasAnim").fadeOut("slow");	
}

function SaveNewJaulasAnim(id)
{
	var error = true;
	
	var E = $("#Especie0NewJaulasAnim").val(); 
	var C = $("#Cepa0NewJaulasAnim").val(); 
	var U = $("#CantidadNewJaulasAnim").val(); 
	var F = $("#RatonIDNewJaulasAnim").val(); 
		
	if(!E)
	{
		alert("Has de se·leccionar una especie");
		error = false;
	}
	if(!C)
	{
		alert("Has de se·leccionar una soca");
		error = false;
	}
	
	if(!U)
	{
		alert("Has d'indicar una quantitat");
		error = false;
	}
	if (!ValidaEnteroRegExp(U))
	{
		alert("La quantitat ha de ser un número enter");
		error = false;
	} 

	if(!F)
	{
		alert("Has d' indicar la ID del ratolí");
		error = false;
	}
	
	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/JaulasAnimGuarda.php",{id:id,E:E,C:C,U:U,F:F},LlegadaSaveNewJaulasAnim);
	}
}

function LlegadaSaveNewJaulasAnim(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewJaulasAnim();
}