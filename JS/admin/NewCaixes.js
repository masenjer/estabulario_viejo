function MostraFitxaNewCaixes(id)
{
	$("#DIVNewCaixes").fadeIn("slow");	
	$("#NewCaixesUnitats").val("");

	CarregaSelectCaixaMaterial();
	CarregaSelectCaixaMida();
	CarregaSelectCaixaMenjar();
	
	document.getElementById("SaveNewCaixes").onclick = function (){SaveNewCaixes(id);};
}

function TancaFitxaNewCaixes()
{
	$("#DIVNewCaixes").fadeOut("slow");	
}

function SaveNewCaixes(id)
{
	var error = true;
	
	var U = $("#NewCaixesUnitats").val(); 
	var T = $("#NewCaixesMaterial").val(); 
	var M = $("#NewCaixesMida").val(); 
	var A = $("#NewCaixesMenjar").val(); 
		
	if(!U)
	{
		alert("Has d'indicar el nombre d'unitats");
		error = false;
	}
	if (!ValidaEnteroRegExp(U))
	{
		alert("La quantitat ha de ser un número enter");
		error = false;
	} 

	if(T=="0")
	{
		alert("Has de sel·leccionar un material");
		error = false;
	}
	
	if(M=="0")
	{
		alert("Has de sel·leccionar una mida");
		error = false;
	}
	
	if(A=="-")
	{
		alert("Has de sel·leccionar si portarà menjar o no");
		error = false;
	}
	
	if (error) 
	{
		//alert("U:"+U+", T:"+T+", M:"+M+", A:"+A);
		$.post("PHPForm/DetallComanda/lib/New/CaixesGuarda.php",{id:id,U:U,T:T,M:M,A:A},LlegadaSaveNewCaixes);
	}
}

function LlegadaSaveNewCaixes(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewCaixes();
}