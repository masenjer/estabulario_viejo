<?php
function InfoData10($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Exportaci&oacute; d\'animals</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Genotip</b></td>
		<td class="CapcaGrid"><b>Identificatiu</b></td>
		<td class="CapcaGrid"><b>Sala</b></td>
	</tr>
';

	$SQL = "SELECT E.NomEspecie_ca, HC.Genotip, HC.Marcatge, HC.Iden, HC.Sala, HC.Sexo, HC.Cant, S.NomSoca, HC.IdExpo, Pr.Projecte, R.ExpoFecha, HC.IdComandaCap, I.Nom, I.Cognoms 
			FROM Expo HC
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 	(Soca S
							INNER JOIN 	Especie E
							ON			E.IdEspecie = S.IdEspecie)		
			ON 			S.IdSoca = HC.Soca
			
			INNER JOIN 	ExpoFecha R
			ON R.IdComandaCap = HC.IdComandaCap
			
			WHERE 	R.ExpoFecha >= '".$f[0]."' 
			AND		R.ExpoFecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, R.ExpoFecha, HC.IdComandaCap ASC";

	//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["ExpoFecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cant"].'</td>
			<td class="GridLine'.$i.'">'.$row["Genotip"].'</td>
			<td class="GridLine'.$i.'">'.$row["Iden"].'</td>
			<td class="GridLine'.$i.'">'.$row["Sala"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';		
}
?>