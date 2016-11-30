<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 

session_start();

$idI = $_POST["idI"];
$idP = $_POST["idP"];
$P = $_POST["P"];

//Niu,U,P1,P2,N,C,E,I

if ($idP){
	$SQL = "UPDATE Projecte SET 
			Projecte = '$P'
			WHERE IdProjecte = ".$idP;
	//echo $SQL;	
}
else{
	$SQL = "INSERT INTO Projecte (IdInvestigador, Projecte) VALUES ($idI,'$P')";
}
	$result = mysql_query($SQL,$oConn);
	
echo $idI;
?>