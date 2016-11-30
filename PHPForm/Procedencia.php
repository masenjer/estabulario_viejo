<?php
function Procedencia($IdCC,$Fecha,$IdCentre)

{
	include("../rao/EstabulariForm_con.php");
	
	$SQL = "INSERT INTO Procedencia(IdComandaCap, Fecha, IdCentre) VALUES ($IdCC, '".InsertFecha($Fecha)."', ".$IdCentre.")";
	$result = mysql_query($SQL,$oConn);

	return $SQL;
}
?>