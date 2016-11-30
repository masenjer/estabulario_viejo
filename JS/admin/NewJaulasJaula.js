function MostraFitxaNewJaulasJaula(id)
{
	$("#DIVNewJaulasJaula").fadeIn("slow");	
	OmpleEspecies(0,'NewJaulasJaula');
	$("#Cepa0NewJaulasJaula").html("");
	$("#SalaNewJaulasJaula").val("");
	$("#PosicionNewJaulasJaula").val("");
	$("#NJaulaNewJaulasJaula").val("");

	$("#SalaNewJaulasJaula").html(SelectSalas());
	
	document.getElementById("SaveNewJaulasJaula").onclick = function (){SaveNewJaulasJaula(id);};
}

function TancaFitxaNewJaulasJaula()
{
	$("#DIVNewJaulasJaula").fadeOut("slow");	
}

function SaveNewJaulasJaula(id)
{
	var error = true;
	
	var E = $("#Especie0NewJaulasJaula").val(); 
	var C = $("#Cepa0NewJaulasJaula").val(); 
	var S = $("#SalaNewJaulasJaula").val(); 
	var P = $("#PosicionNewJaulasJaula").val(); 
	var G = $("#NJaulaNewJaulasJaula").val(); 
		
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
	
	if(!S)
	{
		alert("Has d'indicar la sala");
		error = false;
	}

//	if(!P)
//	{
//		alert("Has d' indicar la posició");
//		error = false;
//	}

	if(!G)
	{
		alert("Has d' indicar el número de gàvia");
		error = false;
	}
	
	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/JaulasJaulaGuarda.php",{id:id,E:E,S:S,P:P,G:G,C:C},LlegadaSaveNewJaulasJaula);
	}
}

function LlegadaSaveNewJaulasJaula(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewJaulasJaula();
}