function MostraFitxaNewPetAnimProd(id)
{
	$("#DIVNewPetAnimProd").fadeIn("slow");	
	OmpleEspecies(0,'NewPetAnimProd');
	$("#Cepa0NewPetAnimProd").html("");
	$("#Cantidad0NewPetAnimProd").val("");
	$("#FechaNac0NewPetAnimProd").val("");
	
	//DefineCalendario('FechaNac0NewPetAnimProd');
	
	document.getElementById("SaveNewPetAnimProd").onclick = function (){SaveNewPetanimProd(id);};
}

function TancaFitxaNewPetAnimProd()
{
	$("#DIVNewPetAnimProd").fadeOut("slow");	
}

function SaveNewPetanimProd(id)
{
	var error = true;
	
	var E = $("#Especie0NewPetAnimProd").val(); 
	var C = $("#Cepa0NewPetAnimProd").val(); 
	var U = $("#Cantidad0NewPetAnimProd").val(); 
	var F = $("#FechaNac0NewPetAnimProd").val(); 
	var NProc = $("#NProc0NewPetAnimProd").val(); 
	var S = $('input[name=Sexo0NewPetAnimProd]:checked').val();
	
		
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
		alert("Hi ha agut un error amb la data de naixement / arribada, torna a sel·leccionar la soca");
		error = false;
	}
	if(!NProc)
	{
		alert("Hi ha hagut un error amb el número de procediment, torna a triar una soca");
		error = false;
	}

	if(!$("input[name=Sexo0NewPetAnimProd]").is(":checked")) 
	{
		alert("Has de sel·leccionar un sexe");	
		error = false;
	}
	
	(S=="M")?VCant = parseInt($("#UniMas0NewPetAnimProd").val()):VCant = parseInt($("#UniFam0NewPetAnimProd").val());
	
	if(U > VCant)
	{
		alert("La quantitat ha de ser inferior a "+ VCant +" animals");
		error = false;
	}
	
	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/PetAnimProdGuarda.php",{id:id,E:E,C:C,U:U,F:F,S:S,NProc:NProc},LlegadaSaveNewPetanimProd);
	}
}

function LlegadaSaveNewPetanimProd(data)
{
	if (data == "error")
	{
		alert("No hi han animals suficients al bloc, degut a que un altre usuari ha finalitzat abans la seva comanda");
	}
	else
	{
	//alert(data);
		var cadena = data.split("|");
		//alert(cadena[1]);
		CarregaGestioComandes(cadena[0]);
		TancaFitxaNewPetAnimProd();
	}
}