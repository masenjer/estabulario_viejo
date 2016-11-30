<?php
function CarregaExpoFecha($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT IdExpoFecha ,ExpoFecha 
			FROM ExpoFecha
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	while ($row = mysql_fetch_array($result))
	{
		$fecha = SelectFecha($row["ExpoFecha"]);
		$idE =	$row["IdExpoFecha"];
	}

	$resultado .= 'Data de l\' exportació: <input type="text" id="EditaFechaExpoFecha"  value="'.$fecha.'" readonly="readonly" class="inputSenseCaixa" style="width:82px;font-weight:bold;" > <input type="button" id="ButtonEditExpoFecha" class="ButtonEdit24" onclick="EditExpoFecha(\''.$idE.','.$id.'\');">';
		
	
	return $resultado;
}
?>