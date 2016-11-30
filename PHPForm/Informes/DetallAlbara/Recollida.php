<?php
function CarregaRecollida($id,$v)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM Recollida
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	while ($row = mysql_fetch_array($result))
	{
		if ($v == "8")
		{
			$resultado = " <b>Data de Recollida </b> <b>";
		}else
		{
			if ($row["Tipus"] == 1) $resultado = " <b>Recollits el dia <b>";
			else $resultado = "<b>Emprats</b> al SE el dia <b>";
		}
		$resultado .= SelectFecha($row["Fecha"]).'</b> a les <b> '.$row["Hora"].'</b>';
		
		if (($v=="1")||($v == "8")||($v==1)||($v == 8))
		{
			if ($row["VM"] == 1) $resultado .= " <b>   - VIUS</b> ";
			else{
				$Sacrifici = array("-----------","CO2","Dislocaci&oacute; Cervical");
				
				 $resultado .= " <b>   - MORTS per ".$Sacrifici[$row["Sacrifici"]]."</b>";	
			}
			
			
		}
	}
	
	
	
	return $resultado;
}
?>