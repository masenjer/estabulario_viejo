<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 

session_start();

///:N,:C,:T,:E,:D,:id

$F = InsertFecha($_GET["F"]);
$id = $_GET["id"];

//Niu,U,P1,P2,N,C,E,I

if ($id)
{
	$SQL = "UPDATE Festiu SET 
			diaFestiu = '$F' 
			WHERE IdFestiu = ".$_GET["id"];	
	$result = mysql_query($SQL,$oConn);
}
else
{
	$SQL = "INSERT INTO Festiu (diaFestiu) VALUES ('$F')";
	if (!$result = mysql_query($SQL,$oConn))die("ERROR:".mysql_error());

	$SQL = "SELECT IdFestiu FROM Festiu ORDER BY IdFestiu DESC LIMIT 1";
	$result = mysql_query($SQL,$oConn);

	while ($row = mysql_fetch_array($result))
	{
		$id = $row["IdFestiu"];
	}
}
	
echo $id;

?>