<?php
function Devolucio($IdCC,$FD,$HD,$SN)

{
	include("../rao/EstabulariForm_con.php");
	
	if ($FD == "") $FD = NULL;
	else $FD = "'".InsertFecha($FD)."'";
	
	$SQL = "INSERT INTO Devolucio(IdComandaCap, Fecha, Hora, Sino) VALUES ($IdCC, $FD, '".$HD."', $SN)";
	$result = mysql_query($SQL,$oConn);

	//echo $SQL;
	return $SQL;
}
?>