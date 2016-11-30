<?php
function Recollida($IdCC,$FR,$HR,$LR, $VM, $SAC)
{
	include("../rao/EstabulariForm_con.php");
	
	$SQL = "INSERT INTO Recollida(IdComandaCap, Fecha, Hora, Tipus, VM, Sacrifici) VALUES ($IdCC, '".InsertFecha($FR)."', '".$HR."', $LR,$VM,$SAC)";
	$result = mysql_query($SQL,$oConn);

	return $SQL;
}
?>