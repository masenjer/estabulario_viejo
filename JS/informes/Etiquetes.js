// JavaScript Document

function ImprimirEtiquetes(id,form)
{
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	window.open('PHPForm/informes/Etiquetes.php?id='+id+'&form='+form);
}

