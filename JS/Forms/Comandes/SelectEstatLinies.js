function GuardaEstatSelectLinies(id,num,taula,idCC)
{
//	alert(2);
//	alert("id:"+id+",num:"+num+",taula:"+taula+",idCC:"+idCC);
	$.post("PHPForm/DetallComanda/lib/GuardaEstatSelectLinies.php",{id:id,num:num,taula:taula,idCC:idCC},LlegadaGuardaEstatSelectLinies)
}

function LlegadaGuardaEstatSelectLinies(data)
{
//	alert(data);
	CarregaGestioComandes(data);	
}