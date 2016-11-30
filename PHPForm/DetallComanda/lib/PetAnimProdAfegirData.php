<?php

include("../../../rao/EstabulariForm_con.php");
include("CanviaElementsStock.php");
include("../../../PHP/Fechas.php"); 
include("ComprovaStock.php");
include("MOVStock.php");


$idPetAnimProd = $_POST["id"];
$fechaNac = InsertFecha($_POST["fecha"]);

$hoy = date("Y-m-d");

$SQL = "SELECT PAP.*, CC.IdProcediment as NProc  
		FROM PetAnimProd PAP
		INNER JOIN ComandaCap CC 
		ON CC.IdComandaCap = PAP.IdComandaCap 
		WHERE IdPetAnimProd =".$idPetAnimProd;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$IdCC = $row["IdComandaCap"];
	$Cantidad = $row["Cantidad"];
	$sexo = $row["Sexo"];
	$idS = $row["IdSoca"];
	$NProc = $row["NProc"];
}

$SQL = "UPDATE PetAnimProd SET FechaNac = '".$fechaNac."' WHERE IdPetAnimProd =".$idPetAnimProd; 
$result = mysql_query($SQL,$oConn);

if (mysql_error($oConn)) die("ERROR:".mysql_error($oConn));
else echo $IdCC;

$UniMas = 0;
$UniFam = 0;

if ($sexo == "M") $UniMas = $Cantidad;
else $UniFam = $Cantidad;

MOVStockGuarda($idS,$UniMas,$UniFam,$hoy,5,12,$fechaNac,$IdCC,3);	
MOVStockGuarda($idS,$UniMas,$UniFam,$hoy,3,$NProc,$fechaNac,$IdCC,3);
MOVStockGuarda($idS,$UniMas,$UniFam,$hoy,6,$NProc,$fechaNac,$IdCC,3);






?>