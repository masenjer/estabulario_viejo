<?php
function Separar($IdCC,$Fecha)
{
	include("../rao/EstabulariForm_con.php");
	session_start();
		
	$SQL = " INSERT INTO Separar(IdComandaCap, FS)VALUES($IdCC,'".$Fecha."')";
	
	//echo $SQL;
	$result = mysql_query($SQL,$oConn);	
}
?>