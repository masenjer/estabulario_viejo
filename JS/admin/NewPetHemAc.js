function MostraFitxaNewPetHemAc(id)
{
	$("#DIVNewPetHemAc").fadeIn("slow");	
	OmpleEspecies(0,'NewPetHemAc');
	$("#Cepa0NewPetHemAc").html("");
	$("#Cantidad0NewPetHemAc").val("");
	$("#Fecha0NewPetHemAc").val("");
	
	DefineCalendario('Fecha0NewPetHemAc');
	
	document.getElementById("SaveNewPetHemAc").onclick = function (){SaveNewPetHemAc(id);};
}

function TancaFitxaNewPetHemAc()
{
	$("#DIVNewPetHemAc").fadeOut("slow");	
}

function SaveNewPetHemAc(id)
{
	var error = true;
	
	var E = $("#Especie0NewPetHemAc").val(); 
	var C = $("#Cepa0NewPetHemAc").val(); 
	var U = $("#Cantidad0NewPetHemAc").val(); 
	var F = $("#Fecha0NewPetHemAc").val(); 
		
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
		alert("Has de sel·leccionar una data d\'acoblament");
		error = false;
	}
	
	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/PetHemAcGuarda.php",{id:id,E:E,C:C,U:U,F:F},LlegadaSaveNewPetHemAc);
	}
}

function LlegadaSaveNewPetHemAc(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewPetHemAc();
}