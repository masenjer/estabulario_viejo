<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$contingut = $_POST["contingut"];
$c2 = Pon($contingut);

$id = $_POST["id"];

switch($_POST["op"])
{
	case 1: 	$SQL = "UPDATE LinMenu SET Contingut = '".$c2."' WHERE IdLinMenu =".$id;
				break;
	case 2: 	$SQL = "UPDATE Linmd SET Contingut = '".$c2."' WHERE IdLinMD =".$id;
				break;

}



$result = mysql_query($SQL,$oConn);

echo $id ."|". $_POST["op"];// $contingut;//."|".$IdLin;
?>