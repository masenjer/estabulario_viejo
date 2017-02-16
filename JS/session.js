function ComprovaSiSessioUser(){
	
	$.get("PHPForm/ComprovaSiSessioUser.php",{},LlegadaComprovaSiSessioUser);
}

function LlegadaComprovaSiSessioUser(data){
	if (!data){
		alert("La sessió ha caducat");
		document.location.reload();	
	}
	else{
	//	setTimeout(ComprovaSiSessioUser, 60100);	
		setTimeout(ComprovaSiSessioUser, 1080100);	
	}	
}
// JavaScript Document