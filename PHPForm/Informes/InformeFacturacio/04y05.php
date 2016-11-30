<?php
function InfoData04y05($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado= '<p>Compra de Fungibles</p>';
			
	$taula = array("Dieta","Lecho", "CajaTrans","Farmac","Desinfectante","Fungible");
	$titol = array("Dietes", "Ja&ccedil;os", "Caixes de Transport", "F&agrave;rmacs", "Desinfectants", "Fungibles");		
	
	for ($i=0;$i<6;$i++)
	{
		$r = $i;
		$r2 = $i+1;
//		echo "/////".$r."////////////";
		$SQL = "SELECT AM.Unitats,  T.Nom".$taula[$r].", AM.Estado, AM.Fecha,Pr.Projecte, I.Nom, I.Cognoms
				FROM ActiuMOV AM  
				INNER JOIN 		(ComandaCap CC 
								LEFT JOIN 		(Projecte Pr
												INNER JOIN 	Investigador I
												ON			I.IdInvestigador = Pr.IdInvestigador)
								ON 				CC.IdProjecte = Pr.IdProjecte)
				ON 				CC.IdComandaCap = AM.IdComandaCap
				INNER JOIN		".$taula[$r]." T
				ON				T.Id".$taula[$r]." = AM.IdActiu
				WHERE 		 
					 		AM.Tipus = $r2 
				AND 		AM.Estado = 1
				AND 		AM.Fecha >= '".$f[0]."'
				AND 		AM.Fecha <= '".$f[1]."'
				".$f[2]."
				ORDER BY	Pr.Projecte, AM.Fecha ASC"; 
		
		$result = mysql_query($SQL,$oConn);
		
		//echo $SQL;
		if ( mysql_num_rows($result) > 0)		
		{	
			$resultado .= '
			
			<p>'.$titol[$r].'</p>
				
				<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
					<tr class="CapcaGrid" align="left" style="text-align:left;">
						<td class="CapcaGrid"><b>Investigador</b></td>
						<td class="CapcaGrid"><b>Projecte</b></td>
						<td class="CapcaGrid"><b>Data</b></td>
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
						<td class="GridLine'.$j.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
						<td class="GridLine'.$j.'">'.$row["Projecte"].'</td>
						<td class="GridLine'.$j.'">'.SelectFecha($row["Fecha"]).'</td>
						<td class="GridLine'.$j.'">'.$row["Unitats"].'</td>
						<td class="GridLine'.$j.'">'.$row["Nom".$taula[$r]].'</td>

					</tr>
				';
				$j++;
				$buit++;
				}
			}	
		
			$resultado .= '</table>';
		}
	}
	if ($buit>0) return $resultado;
}
?>