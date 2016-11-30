function MostraFitxaNewCompraDietaoFarmac(id,taula,r)
{
	$("#DIVNewCompraDietaoFarmac").fadeIn("slow");	
	
	$("#CantNewCompraDietaoFarmac").val(""); 
	$("#FechaNewCompraDietaoFarmac").val(""); 
	
	OmpleSelectConsumible('NewCompraDietaoFarmac',taula);
	
	DefineCalendario('FechaNewCompraDietaoFarmac');
	
	document.getElementById("SaveNewCompraDietaoFarmac").onclick = function (){SaveNewCompraDietaoFarmac(id,r);};
}

function TancaFitxaNewCompraDietaoFarmac()
{
	$("#DIVNewCompraDietaoFarmac").fadeOut("slow");	
}

function SaveNewCompraDietaoFarmac(id,r)
{
	var error = true;
	
	var C = $("#CantNewCompraDietaoFarmac").val(); 
	var I = $("#SelectNewCompraDietaoFarmac").val(); 
	var F = $("#FechaNewCompraDietaoFarmac").val(); 
		
	if(!C)
	{
		alert("Has d'indicar una quantitat");
		error = false;
	}
	if (!ValidaEnteroRegExp(C))
	{
		alert("La quantitat ha de ser un número enter");
		error = false;
	} 
	if(!I)
	{
		alert("Has de sel·leccionar un consumible");
		error = false;
	}
	if(!F)
	{
		alert("Has de sel·leccionar una data");
		error = false;
	}
	
	if (error) 
	{
		$.post("PHPForm/DetallComanda/lib/New/CompraDietaoFarmacGuarda.php",{id:id,C:C,I:I,F:F,r:r},LlegadaSaveNewCompraDietaoFarmac);
	}
}

function LlegadaSaveNewCompraDietaoFarmac(data)
{
	//alert(data);
	var cadena = data.split("|");
	//alert(cadena[1]);
	CarregaGestioComandes(cadena[0]);
	TancaFitxaNewCompraDietaoFarmac();
}