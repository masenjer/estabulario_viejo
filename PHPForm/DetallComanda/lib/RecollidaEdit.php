<?php
	include("../../../PHP/Fechas.php"); 
	include("../../../rao/EstabulariForm_con.php");
	
	$FR = $_POST["FR"];
	$HR = $_POST["HR"];
	$LR = $_POST["LR"];
	$VM = $_POST["VM"];
	$Sacrifici = $_POST["Sacrifici"];

	$id = $_POST["id"];
		
	$SQL = "UPDATE Recollida SET Fecha = '".InsertFecha($FR)."', Hora = '".$HR."', Tipus = ".$LR.", VM = ".$VM.", Sacrifici = ".$Sacrifici." WHERE IdRecollida=".$id;
	$result = mysql_query($SQL,$oConn);

	//echo $SQL;
	echo $id;

?>