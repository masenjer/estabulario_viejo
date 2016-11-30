<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$id = $_GET["id"];
$Titol = Pon($_GET["Titol"]);
$TE = $_GET["TE"];
$URL = $_GET["URL"];

$Orden = 0;

$SQL = "SELECT Orden from EnDirHome ORDER By Orden Desc LIMIT 1" ;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$Orden = $row["Orden"] + 1;
}



if ($id == "")
{	
	$SQL = "INSERT INTO EnDirHome (Titol, TipusEnllac, URL,Orden ) VALUES ('$Titol',$TE,'$URL',$Orden)";
	$result = mysql_query($SQL,$oConn);
	
	$SQL = "SELECT IdEnDirHome FROM EnDirHome ORDER BY IdEnDirHome DESC LIMIT 1";
	$result = mysql_query($SQL,$oConn);
	
	while($row = mysql_fetch_array($result))
	{
		$id = $row["IdEnDirHome"]; 	
	}

}
else
{
	$SQL = "UPDATE EnDirHome SET 
				Titol = '$Titol',
				TipusEnllac = $TE, 
				URL = '$URL'				
				WHERE IdEnDirHome = $id";
	$result = mysql_query($SQL,$oConn);
}

echo $id;
?>