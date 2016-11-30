<?php
function CarregaDetallComanda4($id,$n)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
		<tr valign="top">'.CarregaCompraDietaoFarmac($id,$n).'</tr>
</table>
	';
}

function CarregaCompraDietaoFarmac($id,$z)
{
	include("../../rao/EstabulariForm_con.php");
	
	$taula = array("Dieta","Lecho", "CajaTrans","Farmac","Desinfectante","Fungible");
	$titol = array("Dietes", "Ja&ccedil;os", "Caixes de Transport", "F&agrave;rmacs", "Desinfectants", "Fungibles");		
	
	for ($i=0;$i<3;$i++)
	{
		$r = $i+$z;
		$r2 = $i+1+$z;
//		echo "/////".$r."////////////";
		$SQL = "SELECT AM.Unitats, AM.Fecha, T.Nom".$taula[$r].", AM.IdActiuMOV, AM.Estado
				FROM ActiuMOV AM, ".$taula[$r]." T
				WHERE T.Id".$taula[$r]." = AM.IdActiu AND AM.Tipus = $r2 AND AM.IdComandaCap = ".$id; 
		$result = mysql_query($SQL,$oConn);
		
		//echo $SQL;
		if ( mysql_num_rows($result) > 0)		
		{	
			$resultado .= '<tr><td align="left"><table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
					<tr>
						<td align="left" colspan="3" style="background-color:#444; color:#FFF"><b>'.$titol[$r].'</b></td>
						<td align="right" style="background-color:#444;"><input type="button" class="ButtonAdd24" onclick="MostraFitxaNewCompraDietaoFarmac('.$id.',\''.$taula[$r].'\','.$r2.');"></td>
					</tr>
					<tr class="CapcaGrid" align="left" style="text-align:left;">
						<td>Unitats</td>
						<td>Article</td>
						<td>Data</td>
						<td>Estat</td>
					</tr>';
			$j=0;
			
			while ($row = mysql_fetch_array($result))
			{
				$j%=2;
				$resultado .= '
					<tr>
						<td class="GridLine'.$j.'">'.$row["Unitats"].'</td>
						<td class="GridLine'.$j.'">'.$row["Nom".$taula[$r]].'</td>
						<td class="GridLine'.$j.'">'.SelectFecha($row["Fecha"]).'</td>
						<td class="GridLine'.$j.'">'. CarregaSelectEstat($row["IdActiuMOV"],$row["Estado"],"ActiuMOV",$id).'</td>

					</tr>
				';
				$j++;
			}	
		
			$resultado .= '</table></td></tr>';
		}
	}
	
	
	
	return $resultado;
}
?>