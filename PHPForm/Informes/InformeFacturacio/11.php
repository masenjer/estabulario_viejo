<?php
function InfoData11($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Sol&middot;licitud d\'espai per allotjament d\'animals</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Prove&iuml;dor</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Anim/G&agrave;bia</b></td>
	</tr>
';

	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca, HC.Cant, HC.AJ, HC.Estado, HC.IdEspaiAnimals, Pr.Projecte, P.Fecha, HC.IdComandaCap, C.NomProveidor, I.Nom, I.Cognoms
			FROM EspaiAnimals HC
			
			INNER JOIN		(Procedencia P
								INNER JOIN 	Proveidor C
								ON			P.IdCentre = C.IdProveidor)
			ON				P.IdComandaCap = HC.IdComandaCap
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 		(Soca S
								INNER JOIN 	Especie E
								ON			E.IdEspecie = S.IdEspecie)		
			ON 				S.IdSoca = HC.IdSoca
						
			WHERE 	
					P.Fecha >= '".$f[0]."' 
			AND		P.Fecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, P.Fecha, HC.IdComandaCap ASC";

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
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomProveidor"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cant"].'</td>
			<td class="GridLine'.$i.'">'.$row["AJ"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	
}
?>