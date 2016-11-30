function OmpleEspecies(n,s)
{
	var a = n+s;
	$.get("PHPForm/EspeciesMostra.php",{a:a},LlegadaOmpleEspecies);	
}

function LlegadaOmpleEspecies(data)
{
	var cadena = data.split("|");
	$("#Especie"+cadena[0]).html(cadena[1]);
}