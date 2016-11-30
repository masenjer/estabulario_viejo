<?php
function DadesEcon($IdCC,$Resp, $CC, $RC)
{
	include("../rao/EstabulariForm_con.php");

$SQL = "INSERT INTO DadesEcon(IdComandaCap,Responsable,CentreCost,ReservaCredit) VALUES ($IdCC,'$Resp', '$CC', '$RC')";
$result = mysql_query($SQL,$oConn);
}
?>