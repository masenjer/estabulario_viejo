<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$id = $_GET["id"]; 

switch($_GET["op"])
{
	case "1": 	$SQL = "SELECT Titol,Contingut FROM LinMD WHERE  IdLinMD = " . $id;
				break;
	case "2": 	$SQL = "SELECT Titol,Contingut FROM LinMD WHERE  IdLinMD = " . $IdLinMD;
				break;

}
/////Primero compruebo que no se trate de un nodo padre

	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$Titol = $row["Titol"];
		$Titol = Quita($Titol);
		
		$Contingut = $row["Contingut"];
		//$Contingut = Quita($Contingut);
	}


	$Ruta = $Titol;

echo $Titol ."|". $Contingut."|".$Ruta."|".$IdLinMD;
?>

