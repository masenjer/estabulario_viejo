<?php
include("../rao/EstabulariForm_con.php");

$N = $_POST["N"];
$op = $_POST["op"];

switch ($op)
{
	case "1": 	$taula = "Dieta";
				break;	
	case "2": 	$taula = "Lecho";
				break;	
	case "3": 	$taula = "CajaTrans";
				break;	
	case "4": 	$taula = "Farmac";
				break;	
	case "5": 	$taula = "Desinfectante";
				break;	
	case "6": 	$taula = "Fungible";
				break;	
}


$SQL = "INSERT INTO ".$taula." (Nom".$taula.") VALUES ('$N')";
$result = mysql_query($SQL,$oConn);

echo $T;

?>