<?php
function ComprovaSiSessioCaducadaAdmin(){
	session_start();	
	if(	$_SESSION["IdA"]) return true;
	else{
		echo "***Sessio_Caducada***";
		return false;			 
	}
}

function ComprovaSiSessioCaducadaUserPublic(){
	session_start();	
	if($_SESSION["IdUser"]) return true;
	else{
		echo "***Sessio_Caducada***";
		return false;			 
	}
}
?>