<?php
	include("../../../PHP/Fechas.php"); 
	include("../../../rao/EstabulariForm_con.php");
	
	$F = $_POST["F"];
	$data = $_POST["id"];
	
	$c = explode(",",$data); ///\\\		c[0]:IdArribadaProveidor - c[1]:IdCC		///\\\
	
	if ($c[0] != "")
	{		
		$SQL = "UPDATE ArribadaProveidor SET Fecha = '".InsertFecha($F)."' WHERE IdArribadaProveidor = ".$c[0];
	}else
		$SQL = "INSERT INTO ArribadaProveidor (Fecha, IdComandaCap) VALUES('".InsertFecha($F)."', ".$c[1].")";
	$result = mysql_query($SQL,$oConn);

	echo $id;

?>