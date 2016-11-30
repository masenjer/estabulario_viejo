<?php
	include("../../../PHP/Fechas.php"); 
	include("../../../rao/EstabulariForm_con.php");
	
	$S = $_POST["S"];
	$F = $_POST["F"];
	$id = $_POST["id"];
		
	$SQL = "UPDATE Procedencia SET Fecha = '".InsertFecha($F)."', IdCentre = ".$S." WHERE IdProcedencia =".$id;
	$result = mysql_query($SQL,$oConn);

	echo $id;

?>