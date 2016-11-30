<?php
function InfoData04y05($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	
	$resultado= '<p>Compra de Fungibles</p>';
			
	$taula = array("Dieta","Lecho", "CajaTrans","Farmac","Desinfectante","Fungible");
	$titol = array("Dietes", "Ja&ccedil;os", "Caixes de Transport", "F&agrave;rmacs", "Desinfectants", "Fungibles");		
	
	for ($i=0;$i<6;$i++)
	{
		$r = $i;
		$r2 = $i+1;
//		echo "/////".$r."////////////";
		$SQL = "SELECT AM.IdComandaCap, AM.Unitats, AM.Fecha, T.Nom".$taula[$r].", AM.IdActiuMOV, AM.Estado
				FROM ActiuMOV AM, ".$taula[$r]." T
				
				WHERE 		T.Id".$taula[$r]." = AM.IdActiu 
				AND 		AM.Tipus = $r2 
				AND 		AM.Estado = 1
				AND 		AM.Fecha = '".$fecha."'
				
				ORDER BY IdComandaCap ASC"; 
		
		$result = mysql_query($SQL,$oConn);
		
		//echo $SQL;
		if ( mysql_num_rows($result) > 0)		
		{	
			$resultado .= '
			
			<p>
				'.$titol[$r].'<br>
				<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
					<tr class="CapcaGrid" align="left" style="text-align:left;">
						<td class="CapcaGrid"><b>Comanda</b></td>
						<td class="CapcaGrid"><b>Unitats</b></td>
						<td class="CapcaGrid"><b>Article</b></td>
					</tr>';
			$j=0;
			
			while ($row = mysql_fetch_array($result))
			{
				$j%=2;
				if ($row["Estado"] == "1")
				{
				$resultado .= '
					<tr>
						<td class="GridLine'.$j.'">'.$row["IdComandaCap"].'</td>
						<td class="GridLine'.$j.'">'.$row["Unitats"].'</td>
						<td>'.Quita(utf8_encode($row["Nom".$taula[$r]])).'</td>
					</tr>
				';
				$j++;
				$buit++;
				}
			}	
		
			$resultado .= '</table></p>';
		}
	}
	if ($buit>0) return $resultado;
}
?>