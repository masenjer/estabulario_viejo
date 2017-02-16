<?php
error_reporting(5);

include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 
include("ComprovaStock.php");
include("MOVStock.php");


session_start();

$hoy = date("Y-m-d");

//Cojo el número de procedimiento de la comanda
$SQL = "SELECT IdProcediment FROM ComandaCap WHERE IdComandaCap = ".$_POST["id"] ;
if(!$result = mysql_query($SQL,$oConn))DIE("ERROR: ".mysql_error());


while ($row = mysql_fetch_array($result))
{
	$NProc = $row["IdProcediment"];
}

//$error = ReservaStock($IdProcediment,$_POST["C"],$_POST["id"],$_POST["S"],$_POST["U"],InsertFecha($_POST["F"]));

		
	$SQL = "INSERT INTO PetAnimProd(IdComandaCap, IdSoca, Cantidad, FechaNac, Sexo, IdProcediment, Estado,IdUser, CT) VALUES (". $_POST["id"].",". $_POST["C"].",". $_POST["U"].",'".InsertFecha($_POST["F"])."','". $_POST["S"]."',". $_POST["NProc"].",0,". $_SESSION["IdA"].",1)";
	$result = mysql_query($SQL,$oConn);

	


	$idS = $_POST["C"];
	$fechaNac = InsertFecha($_POST["F"]);
	$IdCC = $_POST["id"];

	$UniMas = 0;
	$UniFam = 0;

	if ($_POST["S"] == "M") $UniMas = $_POST["U"];
	else $UniFam = $_POST["U"];
	



	MOVStockGuarda($idS,$UniMas,$UniFam,$hoy,5,12,$fechaNac,$IdCC,3);	
	MOVStockGuarda($idS,$UniMas,$UniFam,$hoy,3,$NProc,$fechaNac,$IdCC,3);
	MOVStockGuarda($idS,$UniMas,$UniFam,$hoy,6,$NProc,$fechaNac,$IdCC,3);

	echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];


?>