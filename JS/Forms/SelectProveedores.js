function CarregaSelectProveidor(sel,op)
{
	$.get("PHPForm/ProveidorsCarregaSelect.php",{op:op,sel:sel},LlegadaSelectProveidor);
}

function LlegadaSelectProveidor(data)
{
	var cadena = data.split("|");
	$("#"+cadena[0]).html(cadena[1])
}