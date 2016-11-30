<?php
function CarregaDevolucio($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM Devolucio
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	
	if ( mysql_num_rows($result) > 0)		
	{		
		while ($row = mysql_fetch_array($result))
		{
			$resultado = " <b>Data de Devoluci&oacute;</b>  <b>";
			$resultado .= '<input type="text" id="EditaFechaDevolucio"  value="'.SelectFecha($row["Fecha"]).'" readonly="readonly" class="inputSenseCaixa" style="width:82px;font-weight:bold;" ></b> a les <b><input type="text" id="EditaHoraDevolucio" value="'.$row["Hora"].'" readonly="readonly" class="inputSenseCaixa" style="width:40px;font-weight:bold;" ><input type="button" id="ButtonEditDevolucio" class="ButtonEdit24" onclick="EditDevolucio('.$row["IdDevolucio"].');"></b> ';
		}
	}

	return $resultado;
}
?>