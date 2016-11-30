<?php
	include("../../../PHP/Fechas.php"); 
	include("../../../rao/EstabulariForm_con.php");
	
	$FR = $_POST["FR"];
	$HR = $_POST["HR"];
	$id = $_POST["id"];
		
	$SQL = "UPDATE Recollida SET Fecha = '".InsertFecha($FR)."', Hora = '".$HR."' WHERE IdRecollida=".$id;
	$result = mysql_query($SQL,$oConn);

	echo $id;

?>