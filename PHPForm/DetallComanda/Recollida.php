<?php
function CarregaRecollida($id,$v)
{
	include("../../rao/EstabulariForm_con.php");
	include("SelectHora.php");
		
	$SQL = "SELECT *
			FROM Recollida
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	while ($row = mysql_fetch_array($result))
	{
		if ($v == "8")
		{
			$resultado = '<br> <b>Data de Recollida</b> <input type="hidden" id="EditaLRRecollida" value="1">
			<b>';
		}else
		{
			$r = array("Emprats","Recollits");
			
			$resultado = '
				<select class="selectSenseCaixa" id="EditaLRRecollida" disabled="true">';
			for ($i=0;$i<2;$i++)
			{
				if($row["Tipus"] == $i) $selected = ' selected ';
				else $selected = "";
				
				$resultado .= '<option value="'.$i.'" '.$selected.'>'.$r[$i].'</option>';
			}
			
			$resultado.='</select> al SE el dia <b>';
		}

		$resultado .= '<input type="text" id="EditaFechaRecollida"  value="'.SelectFecha($row["Fecha"]).'" readonly="readonly" class="inputSenseCaixa" style="width:82px;font-weight:bold;" ></b> a les '.SelectHoraRecollida($row["Hora"]);
		
		$Estat = array("MORTS","VIUS");
		
		$Sel_Estat = '<select class="selectSenseCaixa" id="EditaEstatRecollida" disabled="true">';
		for ($i=0;$i<2;$i++)
		{
			if($row["VM"] == $i) $selected = ' selected ';
			else $selected = "";
			$Sel_Estat .= '<option value="'.$i.'" '.$selected.'>'.$Estat[$i].'</option>';
		}
		$Sel_Estat .='</select>';
//		if ($v=="1")

		$Sacrifici = array("-----------","CO2","Dislocaci&oacute; Cervical");
		$Sel_Sacrifici = '<select class="selectSenseCaixa" id="EditaSacrificiRecollida" disabled="true">';
		for ($i=0;$i<3;$i++)
		{
			if($row["Sacrifici"] == $i) $selected = ' selected ';
			else $selected = "";
			
			$Sel_Sacrifici .= '<option value="'.$i.'" '.$selected.'>'.$Sacrifici[$i].'</option>';
		}
		$Sel_Sacrifici .='</select>';
		
		$resultado .=  $Sel_Estat." ".$Sel_Sacrifici;
		
		$button='<input type="button" id="ButtonEditRecollida" class="ButtonEdit24" onclick="EditRecollida('.$row["IdRecollida"].');">';
		
		$resultado .= $button;
		
//		{
//			if ($row["VM"] == 1) $resultado .= " <b>   - VIUS</b> ";
//			else
//			{
//				switch($row["Sacrifici"])
//				{
//					case "1": $sacrifici = "CO2";
//							break;
//					case "2": $sacrifici = "Dislocaci&oacute; cervical";
//							break;
//					default: $sacrifici = "ERROR: No indicat";
//							break;
//				}
//				
//				$resultado .= " <b>   - MORTS - M&egrave;tode de sacrifici: ".$sacrifici."</b>";	
//			}
////		}
	}
	
	
	
	return $resultado;
}
?>