<?php
	include("../../../PHP/Fechas.php"); 
	include("../../../rao/EstabulariForm_con.php");
	
	$F = $_POST["F"];
	$data = $_POST["id"];
	
	$c = explode(",",$data);
	
	if ($c[0] != "")
	{		
		$SQL = "UPDATE ExpoFecha SET ExpoFecha = '".InsertFecha($F)."' WHERE IdExpoFecha = ".$c[0];
	}else
		$SQL = "INSERT INTO ExpoFecha (ExpoFecha, IdComandaCap) VALUES('".InsertFecha($F)."', ".$c[1].")";
	$result = mysql_query($SQL,$oConn);
	
	if ($c[0]) echo $c[0];
	else echo mysql_insert_id();

?>