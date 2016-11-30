function OmpleCepas(n,s)
{
	var a = n+s;
	var id = $("#Especie"+a).val();
	$.get("PHPForm/CepasMostra.php",{id:id,a:a},LlegadaOmpleCepas);	
}

function LlegadaOmpleCepas(data)
{
	var cadena = data.split("|");
	
	$("#Cepa"+cadena[0]).html(cadena[1]);
}