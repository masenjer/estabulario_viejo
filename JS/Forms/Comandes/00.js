//////////////////////////////////00
function GuardaEstatFrangHor(id, idCC)
{
	
	
	var val = $("#EstatFrangHor"+id).val();
	
	if (val=="2") $("#DIVDenegat"+id).show(500);
	else $("#DIVDenegat"+id).hide(500);
	
	$.post("PHPForm/DetallComanda/lib/GuardaEstatFrangHor.php",{id:id,idCC:idCC,val:val},LlegadaGuardaEstatFrangHor)	
}

function LlegadaGuardaEstatFrangHor(data)
{
//	alert(data);
	CarregaGestioComandes(data);	
}

function SaveTADenegaReservaFrangHor(id,idCC)
{
	var val = $("#TADeniegaFrangHor"+id).val();	
	$.post("PHPForm/DetallComanda/lib/GuardaDeniegaFrangHor.php",{id:id,idCC:idCC,val:val},LlegadaSaveTADenegaReservaFrangHor);	
}

function LlegadaSaveTADenegaReservaFrangHor(data)
{
	alert("Explicació guardada");
	CarregaGestioComandes(data);	
}