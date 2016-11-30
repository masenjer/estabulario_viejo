function ComprovaSiSessioCaducada(){
		$.post("PHPForm/SessioCaducada.php",{},LlegadaComprovaSiSessioCaducada);
}

function LlegadaComprovaSiSessioCaducada(data){
	alert("La teva sessió a caducat");
	location.reload();
	return false;	
}

	