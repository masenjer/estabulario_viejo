function MostraFitxaNewEspaiAnimals(id)
{
	$("#DIVNewEspaiAnimals").fadeIn("slow");	
	OmpleEspecies(0,'NewEspaiAnimals');
	$("#Cepa0NewEspaiAnimals").html("");
	$("#Cantidad0NewEspaiAnimals").val("");
	$("#EdadNewEspaiAnimals").val("");
	$("#AnimJaulaNewEspaiAnimals").val("");
	
	$("#SexoNewEspaiAnimals").html(SelectSexo());
	$("#SemGramNewEspaiAnimals").html(SelectSP());

	
	document.getElementById("SaveNewEspaiAnimals").onclick = function (){SaveNewEspaiAnimals(id);};
}

function TancaFitxaNewEspaiAnimals()
{
	$("#DIVNewEspaiAnimals").fadeOut("slow");	
}

function SaveNewEspaiAnimals(id)
{
	var error = true;
	
	var E = $("#Especie0NewEspaiAnimals").val(); 
	var C = $("#Cepa0NewEspaiAnimals").val(); 
	var U = $("#Cantidad0NewEspaiAnimals").val(); 
	var Edad = $("#EdadNewEspaiAnimals").val();
	var J = $("#AnimJaulaNewEspaiAnimals").val();
	var S = $("#SexoNewEspaiAnimals").val();
	var SG = $("#SemGramNewEspaiAnimals").val();
		
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
	if(!Edad)
	{
		alert("Has d'indicar una edad o peso");
		error = false;
	}
	if(!J)
	{
		alert("Has d'indicar quants animals van per gavia");
		error = false;
	}
	if(!S)
	{
		alert("Has d'indicar un sexe vàlid");
		error = false;
	}
	if(!SG)
	{
		alert("Has de sel·leccionar semanas o gramos");
		error = false;
	}
	
	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/EspaiAnimalsGuarda.php",{id:id,E:E,C:C,U:U,Edad:Edad,J:J,S:S,SG:SG},LlegadaSaveNewEspaiAnimals);
	}
}

function LlegadaSaveNewEspaiAnimals(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewEspaiAnimals();
}