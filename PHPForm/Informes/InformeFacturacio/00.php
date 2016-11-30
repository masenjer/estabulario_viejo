<?php
function InfoData00($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$SQL1 = "SELECT E.NomEquip, R.IdComandaCap, FH.Desde, FH.Hasta, FH.Fecha, Pr.Projecte, I.Nom, I.Cognoms
			FROM ReservaEspai R 
				INNER JOIN 		FrangHor FH
				ON				R.IdComandaCap = FH.IdComandaCap
				INNER JOIN 		Equips E
				ON				R.Equips = E.IdEquip
				INNER JOIN 		(ComandaCap CC 
								LEFT JOIN 		(Projecte Pr 
												INNER JOIN 	Investigador I
												ON			I.IdInvestigador = Pr.IdInvestigador)
								ON 				CC.IdProjecte = Pr.IdProjecte)
				ON 				CC.IdComandaCap = R.IdComandaCap
								
			WHERE 	FH.Fecha >= '".$f[0]."'
			AND 	FH.Fecha <= '".$f[1]."'
			AND 	FH.Estat = 1
			".$f[2]."
			ORDER BY I.Cognoms, I.Nom,Pr.Projecte, FH.Fecha, FH.Desde ASC
	 ";
	 
	// echo $SQL1;
	
	$result1 = mysql_query($SQL1,$oConn);
	
	$text1 = '
<p>Reserva d\' espais i equips al SE</p>


<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
			<td class="CapcaGrid"><b>Investigador</b></td>
			<td class="CapcaGrid"><b>Projecte</b></td>
			<td class="CapcaGrid"><b>Data</b></td>
			<td class="CapcaGrid"><b>Desde</b></td>
			<td class="CapcaGrid"><b>Hasta</b></td>
			<td class="CapcaGrid"><b>Comanda</b></td>
			<td class="CapcaGrid"><b>Equip</b></td>
		</tr>
	';

	$i = 0;
	
	while ($row = mysql_fetch_array($result1))
	{
		$i%=2;

		$text1 .= '	
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'. SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["Desde"].'</td>
			<td class="GridLine'.$i.'">'.$row["Hasta"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEquip"].'</td>
		</tr>
	';
		$i++;
		$buit ++;
	}
	$text1 .= "
	</table>
	";
	
	if ($buit > 0)return $text1;
}
?>
