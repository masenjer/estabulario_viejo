<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 
include("Fechas.php");

$T = $_GET["T"];
$C = $_GET["C"];
$T = Pon($T);
$F = $_GET["F"];
$F = InsertFecha($F);
$FP = $_GET["FP"];
$FP = InsertFecha($FP);
$FD = $_GET["FD"];
$FD = InsertFecha($FD);
$IMG = $_GET["IMG"];
$id = $_GET["id"];

if ($id == "")
{	
	$SQL = "INSERT INTO Noticias(Titol, Cos, FechaNot, FechaPub, FechaDesPub, Image) VALUES ('$T','$C','$F','$FP','$FD','$IMG')";
	$result = mysql_query($SQL,$oConn);
	
	$SQL = "SELECT IdNoticia FROM Noticias ORDER BY IdNoticia DESC LIMIT 1";
	$result = mysql_query($SQL,$oConn);
	
	while($row = mysql_fetch_array($result))
	{
		$id = $row["IdNoticia"]; 	
	}

}
else
{
	$SQL = "UPDATE Noticias SET 
				Titol = '$T',
				Cos = '$C', 
				FechaNot = '$F', 
				FechaPub = '$FP', 
				FechaDesPub = '$FD',
				Image = '$IMG'
				WHERE IdNoticia = $id";
	$result = mysql_query($SQL,$oConn);
}

echo $id;
?>