<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 

session_start();

///:N,:C,:T,:E,:D,:id

$N = $_GET["N"];
$C = $_GET["C"];
$T = $_GET["T"];
$E = $_GET["E"];
$D = $_GET["D"];
$id = $_GET["id"];

//Niu,U,P1,P2,N,C,E,I

if ($id)
{
	$SQL = "UPDATE Investigador SET 
			Nom = '$N',
			Cognoms = '$C',
			Telefon = $T, 
			Email = '$E',
			Departament = '$D'
			WHERE IdInvestigador = ".$_GET["id"];	
	$result = mysql_query($SQL,$oConn);
}
else
{
	$SQL = "INSERT INTO Investigador (Nom, Cognoms, Telefon, Email, Departament) VALUES ('$N','$C','$T','$E','$D')";
	$result = mysql_query($SQL,$oConn);

	$SQL = "SELECT IdInvestigador FROM Investigador ORDER BY IdInvestigador DESC LIMIT 1";
	$result = mysql_query($SQL,$oConn);

	while ($row = mysql_fetch_array($result))
	{
		$id = $row["IdInvestigador"];
	}
}
	
echo $id;

//echo $SQL;
?>