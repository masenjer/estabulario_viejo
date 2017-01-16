function MostraPaqueteria()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa8").fadeIn("slow");
		InicialitzaPaqueteria('Paqueteria');
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}



function TancaPaqueteria()
{
	$("#DIVFitxa8").fadeOut("slow");
}


function InicialitzaPaqueteria(form)
{
	$("#Obs"+form).val("");
	
	$("#Proveidor"+form).val("");	
	$("#Concepte"+form).val("");	
	$("#Fecha"+form).val("");	
	$("#Ident"+form).val("");
	$("#Condicions"+form+" option[value='']").attr("selected",true);
	DefineCalendario("Fecha"+form);
}


function GuardaPaqueteria(form)
{
	var error = 0;
	
	var P = $("#Proveidor"+form).val();	
	var C = $("#Concepte"+form).val();	
	var F = $("#Fecha"+form).val();	
	var I = $("#Ident"+form).val();
	var CE = $("#Condicions"+form).val();

	var Obs = $("#Obs"+form).val();

	if (!P||!C||!F||!I||!CE)
	{
		error = 1;
		alert("Has d'omplir tots els camps");
	}
	
	if (!FechaFutura(F,"d'arribada prevista")) 
	{
		error = 1;
	}	
		
	if (error == 0) $.post("PHPForm/PaqueteriaGuarda.php",{P:P,C:C,F:F,I:I,CE:CE,Obs:Obs},LlegadaGuardaPaqueteria);
}

function LlegadaGuardaPaqueteria(data)
{
	//alert(data);
	alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
	$("#DIVFitxa8").fadeOut("slow");
}