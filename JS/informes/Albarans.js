// JavaScript Document

function ImprimirAlbara(id)
{
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	window.open('PHPForm/informes/albarans.php?id='+id);
}

function ImprimirAlbaraPetAnimProd(id)
{
	///Crea movimiento de venta en Stoc del procedimento para todas las cepas aceptadas del pedido
	//CreaSalidaPetAnimProd(id)
	
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	window.open('PHPForm/informes/albarans.php?id='+id);
}

