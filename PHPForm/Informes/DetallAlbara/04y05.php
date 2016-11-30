<?php
function CarregaDetallComanda4($id,$n)
{
	return '<b>Compra de dietes, ja&ccedil;os i caixes de transport </b><br><br>
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
		'.CarregaCompraDietaoFarmac($id,$n).'
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
				WHERE T.Id".$taula[$r]." = AM.IdActiu AND AM.Tipus = $r2 AND AM.Estado =1  AND AM.IdComandaCap = ".$id; 
				
				//echo $SQL;
		$result = mysql_query($SQL,$oConn);
		
		//echo $SQL;
		if ( mysql_num_rows($result) > 0)		
		{	
			$resultado .= '<tr><td align="left">
			<div style="border:1px solid #9e9885">
				<table width="100%" cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
					<tr>
						<td align="left" colspan="2" style="background-color:#444; color:#FFF"><b>'.$titol[$r].'</b></td>
						<td align="right" style="background-color:#444;"></td>
					</tr>
					<tr class="CapcaGrid" align="left" style="text-align:left;">
						<td style="background-color:#444; color:#FFF; border:none" align="left">Unitats</td>
						<td style="background-color:#444; color:#FFF; border:none" align="left">Article</td>
						<td style="background-color:#444; color:#FFF; border:none" align="left">Data</td>
					</tr>';
			$j=0;
			
			while ($row = mysql_fetch_array($result))
			{
				$j%=2;
				$resultado .= '
					<tr>
						<td>'.$row["Unitats"].'</td>
						<td>'.$row["Nom".$taula[$r]].'</td>
						<td>'.SelectFecha($row["Fecha"]).'</td>
					</tr>
				';
				$j++;
			}	
		
			$resultado .= '</table></div><br></td></tr>';
		}
	}
	
	
	
	return $resultado;
}
?>