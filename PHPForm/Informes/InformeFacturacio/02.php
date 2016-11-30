<?php
function InfoData02($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado= '

<p>Petici&oacute; de Femelles Acoblades</p>


<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Naixement /<br> Arribada</b></td>
	</tr>
';
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.Fecha as FechaNaix, PP.Estado, PP.IdPetHemAc, R.Hora, PP.IdComandaCap, R.Fecha as FechaFac, Pr.Projecte, I.Nom, I.Cognoms 
			FROM PetHemAc PP
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = PP.IdComandaCap
			INNER JOIN 		(Soca S 
							INNER JOIN 	Especie E 
							ON 			E.IdEspecie = S.IdEspecie)
			ON				S.IdSoca = PP.IdSoca
			INNER JOIN		Recollida R
			ON				R.IdComandaCap = PP.IdComandaCap
			WHERE 
				 		R.Fecha >= '".$f[0]."'
			AND 		R.Fecha <= '".$f[1]."'
			AND 		PP.Estado = 1
			".$f[2]."
			ORDER BY	Pr.Projecte, R.Hora, PP.IdComandaCap ASC
			"; 
	$result = mysql_query($SQL,$oConn);
	//echo $SQL;
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
				
		if ($row["Estado"]=="1" )
		{
			$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["FechaFac"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["FechaNaix"]).'</td>
		</tr>
	';
		$i++;
		$buit++;
		}
		
	}
	$resultado .= '
	</table>';
	
	if ($buit>0) return $resultado;
}
?>