function CarregaSelectProjecte(form)
{
	$.get("PHPForm/SelectProjecte.php",{form:form},LlegadaCarregaSelectProjecte);	
}

function LlegadaCarregaSelectProjecte(data)
{
	var cadena = data.split("|");
	$("#CentreCost"+cadena[0]).html(cadena[1]);
}