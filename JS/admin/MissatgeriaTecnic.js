function EnviaMissatgeObsTecnic(id)
{
	var Obs = $("#TextMissatgeObs").val();
	
	if (Obs) $.post("PHPForm/DetallComanda/lib/EnviaMissatgeObsTecnic.php",{Obs:Obs,id:id},LlegadaEnviaMissatgeObsTecnic);	
	else alert("El missatge no pot estar buit");
}

function LlegadaEnviaMissatgeObsTecnic(data)
{
	SelectRowComanda(data);	
}