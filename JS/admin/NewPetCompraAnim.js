function MostraFitxaNewPetCompraAnim(id)
{
	$("#DIVNewPetCompraAnim").fadeIn("slow");	
	OmpleEspecies(0,'NewPetCompraAnim');
	$("#Cepa0NewPetCompraAnim").html("");

	//$("#ProvHab0NewPetCompraAnim").html(SelectProvHab());	
	//$("#ProvTrans0NewPetCompraAnim").html(SelectProvTrans());
	
	CarregaSelectProveidor("ProvHab0NewPetCompraAnim","0");
	CarregaSelectProveidor("ProvTrans0NewPetCompraAnim","1");	
	
	$("#SemGramM0NewPetCompraAnim").html(SelectSP());
	$("#SemGramF0NewPetCompraAnim").html(SelectSP());
	
	$("#CantidadM0NewPetCompraAnim").val("");
	$("#CantidadF0NewPetCompraAnim").val("");
	$("#EdadM0NewPetCompraAnim").val("");
	$("#EdadF0NewPetCompraAnim").val("");
	
	document.getElementById("SaveNewPetCompraAnim").onclick = function (){SaveNewPetCompraAnim(id);};
}

function TancaFitxaNewPetCompraAnim()
{
	$("#DIVNewPetCompraAnim").fadeOut("slow");	
}

function SaveNewPetCompraAnim(id)
{
	var error = true;
	
	var E = $("#Especie0NewPetCompraAnim").val(); 
	var C = $("#Cepa0NewPetCompraAnim").val(); 
	var UM = $("#CantidadM0NewPetCompraAnim").val(); 
	var EM = $("#EdadM0NewPetCompraAnim").val(); 
	var EUM = $("#SemGramM0NewPetCompraAnim").val(); 
	var UF = $("#CantidadF0NewPetCompraAnim").val(); 
	var EF = $("#EdadF0NewPetCompraAnim").val(); 
	var EUF = $("#SemGramF0NewPetCompraAnim").val(); 

	if ($("#ProvHab0NewPetCompraAnim").val() == 0) var prov = $("#ProvTrans0NewPetCompraAnim").val(); 
	else var prov = $("#ProvHab0NewPetCompraAnim").val() ; 
		
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
	if(!UM)
	{
		alert("Has d'indicar una quantitat de mascles");
		error = false;
	}
	if(!EM)
	{
		alert("Has d'indicar l'edat/pes dels mascles");
		error = false;
	}
	if (!ValidaEnteroRegExp(UM))
	{
		alert("La quantitat de mascles ha de ser un número enter");
		error = false;
	} 
	if(!UF)
	{
		alert("Has d'indicar una quantitat de femelles");
		error = false;
	}
	if(!EF)
	{
		alert("Has d'indicar l' edat/pes de les femelles");
		error = false;
	}
	if (!ValidaEnteroRegExp(UF))
	{
		alert("La quantitat de femelles ha de ser un número enter");
		error = false;
	} 
	if(!prov)
	{
		alert("Has d'indicar un proveidor");
		error = false;
	}

	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/PetCompraAnimGuarda.php",{id:id,C:C,UM:UM,EM:EM,UF:UF,EF:EF,EUM:EUM,EUF:EUF,prov:prov},LlegadaSaveNewPetCompraAnim);
	}
}

function LlegadaSaveNewPetCompraAnim(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewPetCompraAnim();
}