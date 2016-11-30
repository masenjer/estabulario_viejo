<?php
include("../rao/EstabulariForm_con.php");
session_start();

$resultado = '<option value="0">------</option>';

$SQL = "SELECT IdProcediment, NumProc 
		FROM Procediment
		ORDER BY NumProc ASC";		;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$resultado =  $resultado . '<option value="'.$row["IdProcediment"].'">'.$row["NumProc"].'</option>';
}

echo $resultado;

?>