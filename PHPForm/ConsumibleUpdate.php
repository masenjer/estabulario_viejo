<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 

session_start();



///:idI,:idP,:P

$id = $_POST["id"];
$taula = $_POST["taula"];
$C = $_POST["C"];

//Niu,U,P1,P2,N,C,E,I

if ($id){
	$SQL = "UPDATE ".$taula." SET 
			Nom".$taula." = '$C'
			WHERE Id".$taula." = ".$id;
	//echo $SQL;	
}
else{
	$SQL = "INSERT INTO ".$taula." (Nom".$taula.") VALUES ('$C')";
}
	$result = mysql_query($SQL,$oConn);
	
echo $id;
?>