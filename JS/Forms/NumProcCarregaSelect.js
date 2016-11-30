function NumProcCarregaSelect(form)
{
	$.get("PHPForm/NumProcCarregaSelect.php",{form:form},LlegadaCompruebaSiExisteNumProc);	
}

function LlegadaCompruebaSiExisteNumProc(data)
{
	var cadena = data.split("|");
	if (cadena[1]) 
	{
		$("#NProc"+cadena[0]).html(data);
	}
	else
	{
		alert("Su usuario no est\á no tiene permisos para ning\ún procedimiento");	
	}	
}
