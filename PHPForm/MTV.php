<?php
function MTV($IdCC,$Desde, $Hasta)
{
	include("../rao/EstabulariForm_con.php");
	session_start();
		
	$SQL = " INSERT INTO MTV(IdComandaCap, MTVD, MTVH)VALUES($IdCC,'".$Desde."','".$Hasta."')";

	$result = mysql_query($SQL,$oConn);	
}
?>