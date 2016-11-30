<?php
function CarregaRecollida($id,$v)
{
	include("../../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM Recollida
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	while ($row = mysql_fetch_array($result))
	{
		if ($v == "8")
		{
			$resultado = " <b>Data de Recollida</b> <b>";
		}else
		{
			if ($row["Tipus"] == 1) $resultado = " <b>Recollits</b> el dia <b>";
			else $resultado = "<b>Emprats</b> al SE el dia <b>";
		}
		$resultado .= '<input type="text" id="EditaFechaRecollida"  value="'.SelectFecha($row["Fecha"]).'" readonly="readonly" class="inputSenseCaixa" style="width:82px;font-weight:bold;" ></b> a les <b><input type="text" id="EditaHoraRecollida" value="'.$row["Hora"].'" readonly="readonly" class="inputSenseCaixa" style="width:40px;font-weight:bold;" ></b>';
		
		//if ($v=="1")
		//{
			if ($row["VM"] == 1) $resultado .= " <b>   - VIUS</b> ";
			else
			{
				switch($row["Sacrifici"])
				{
					case "1": $sacrifici = "CO2";
							break;
					case "2": $sacrifici = "Dislocaci&oacute; cervical";
							break;
					default: $sacrifici = "ERROR: No indicat";
							break;
				}
				
				$resultado .= " <b>   - MORTS - M&egrave;tode de sacrifici: ".$sacrifici."</b>";	
			}
	//	}
	}
	
	return $resultado;
}
?>