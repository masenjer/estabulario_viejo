<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 
include("ComprovaStock.php");
include("ReservarStock.php");


session_start();

$error = ReservaStock($_POST["NProc"],$_POST["C"],$_POST["id"],$_POST["S"],$_POST["U"],InsertFecha($_POST["F"]));

if ($error == 0)
{		
	$SQL = "INSERT INTO PetAnimProd(IdComandaCap, IdSoca, Cantidad, FechaNac, Sexo, IdProcediment, Estado,IdUser, CT) VALUES (". $_POST["id"].",". $_POST["C"].",". $_POST["U"].",'".InsertFecha($_POST["F"])."','". $_POST["S"]."',". $_POST["NProc"].",0,". $_SESSION["IdA"].",1)";
	$result = mysql_query($SQL,$oConn);

	echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
}
else echo "error";
?>