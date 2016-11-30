function EnviaMissatgeObsUser(id)
{
	var Obs = $("#TextMissatgeUserObs").val();
	
	if (Obs) $.post("PHPForm/AdminPublic/DetallComanda/lib/EnviaMissatgeObsUser.php",{Obs:Obs,id:id},LlegadaEnviaMissatgeObsUser);	
	else alert("El missatge no pot estar buit");
}

function LlegadaEnviaMissatgeObsUser(data)
{
	SelectRowUserComanda(data);	
}