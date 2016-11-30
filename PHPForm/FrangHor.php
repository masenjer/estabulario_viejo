<?php
function FrangHor($IdCC,$Horari)
{
	include("../rao/EstabulariForm_con.php");
	
	$v = explode("#",$Horari);
	
	for ($i=1; $i<count($v); $i++)
	{
		$cadena = explode("|",$v[$i]);
		if ($cadena[0])
		{
			$SQL = "INSERT INTO FrangHor(IdComandaCap, Fecha, Desde, Hasta) VALUES ($IdCC,'".InsertFecha($cadena[0])."','".$cadena[1]."', '".$cadena[2]."')";
			$result = mysql_query($SQL,$oConn);
		}
	}
}
?>