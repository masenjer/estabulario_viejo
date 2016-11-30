function CompruebaSiExisteNumProc(form)
{
	var NProc = $("#NProc"+form).val();
	
	if (NProc && validarEntero(NProc))
	{
		$.get("PHPForm/CompruebaSiExisteNumProc.php",{NProc:NProc},LlegadaCompruebaSiExisteNumProc);	
	}else
	{
		$("#NumProc").val("");
		alert("Has de introducir un n\úmero entero en el campo n\úmero de procedimiento");	
	}
}

function LlegadaCompruebaSiExisteNumProc(data)
{
	if (data) 
	{
		$("#NumProc").val(data);
	}
	else
	{
		$("#NumProc").val("");
		alert("El n\úmero de procedimiento introducido no se encuentra en nuestra base de datos. Por favor, rev\íselo y en caso de que sea correcto p\óngase en contacto con nosotros y procederemos a darlo de alta para futuros pedidos");	
	}	
}
