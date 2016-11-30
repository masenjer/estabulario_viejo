// JavaScript Document

function ImprimirAlbara(id)
{
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	window.open('PHPForm/informes/albarans.php?id='+cadena[1]);
}

