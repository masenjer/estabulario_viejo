<?php
function InfoDataCaixes($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Caixes</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Mida</b></td>
		<td class="CapcaGrid"><b>Material</b></td>
		<td class="CapcaGrid"><b>Menjar</b></td>
	</tr>
';

	$SQL = "SELECT MC.NomMidaCaixa, TC.NomTipusCaixa, C.Unidades, Pr.Projecte, R.Fecha as FechaR, P.Fecha as FechaP, EF.ExpoFecha, C.Menjar, CC.IdComandaCap, I.Nom, I.Cognoms
			FROM Caixa C
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = C.IdComandaCap

			INNER JOIN 		MidaCaixa MC 
			ON				MC.IdMidaCaixa = C.IdMidaCaixa
			
			INNER JOIN		TipusCaixa TC
			ON				TC.IdTipusCaixa = C.IdTipusCaixa
							
			LEFT JOIN		Recollida R
			ON				R.IdComandaCap = C.IdComandaCap
			
			LEFT JOIN		Procedencia P	
			ON				P.IdComandaCap = C.IdComandaCap
			
			LEFT JOIN 		ExpoFecha EF
			ON				EF.IdComandaCap = C.IdComandaCap

			WHERE
			((
						P.Fecha >= '".$f[0]."' 
				AND		P.Fecha <= '".$f[1]."'	
			)OR(
						R.Fecha >= '".$f[0]."'
				AND 	R.Fecha <= '".$f[1]."'
			)OR(
						EF.ExpoFecha >= '".$f[0]."' 
				AND		EF.ExpoFecha <= '".$f[1]."'
			))
			".$f[2]."
			
			ORDER BY Pr.Projecte, CC.IdComandaCap";
			


	//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		if ($row["Menjar"]==0) $menjar= "No";
		else $menjar = "S&iacute;";
		
		if ($row["FechaR"]) $fecha = $row["FechaR"];
		else {
			if ($row["FechaP"]) $fecha = $row["FechaP"];
			else $fecha = $row["ExpoFecha"];
		}
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($fecha).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["Unidades"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomMidaCaixa"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomTipusCaixa"].'</td>
			<td class="GridLine'.$i.'">'.$menjar.'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	
}
?>