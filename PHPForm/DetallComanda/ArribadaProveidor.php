<?php
function CarregaArribadaProveidor($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT Fecha,IdArribadaProveidor
			FROM ArribadaProveidor
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	while ($row = mysql_fetch_array($result))
	{
		$fecha = SelectFecha($row["Fecha"]);
		$idP = $row["IdArribadaProveidor"];	
	}

	$resultado .= 'Data d\' <b>arribada</b> de la comanda al <b>prove&iuml;dor</b>: <input type="text" id="EditaFechaArribadaProveidor"  value="'.$fecha.'" readonly="readonly" class="inputSenseCaixa" style="width:82px;font-weight:bold;" > <input type="button" id="ButtonEditArribadaProveidor" class="ButtonEdit24" onclick="EditArribadaProveidor(\''.$idP.','.$id.'\');">';
	
	return $resultado;
}
?>