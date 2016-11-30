// JavaScript Document

function ImprimirAutoEntrada(id,TP)
{
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	window.open('PHPForm/informes/AutoEntrada.php?id='+id+'&TP='+TP);
}

