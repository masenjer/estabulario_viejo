<?php
function InfoData01($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado= '

<p>Petici&oacute; d\'animals produ&iuml;ts al Servei d\'Estabulari</p>

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
		<td class="CapcaGrid"><b>Sexe</b></td>
	</tr>
';
			
	$SQL = "SELECT PP.IdPetAnimProd,E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.FechaNac, PP.Sexo, PP.Estado, S.IdSoca, R.Hora, R.Tipus, PP.IdComandaCap, R.Fecha, Pr.Projecte, I.Nom, I.Cognoms
			FROM PetAnimProd PP 
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
			ORDER BY	Pr.Projecte, R.Fecha, R.Hora, PP.IdComandaCap ASC
			"; 
//echo $SQL;
	$result = mysql_query($SQL,$oConn);
	
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		
		switch ($row["Sexo"])
		{
			case "M": 	$sex="Mascle";
						break;
			case "F":	$sex="Femella";	
						break;
			default: 	$sex="Indiferent";
						break;
		}
		
		if ($row["Estado"]=="1" )
		{
			$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["FechaNac"]).'</td>
			<td class="GridLine'.$i.'">'.$sex.'</td>
		</tr>
	';
		
			if ($sex=="Indiferent")
			{
				$SQL2 = "SELECT * FROM PetAnimProdSub WHERE IdPetAnimProd =". $row["IdPetAnimProd"];
				$result2 = mysql_query($SQL2,$oConn);
				
				//echo $SQL2;
				while ($row2 = mysql_fetch_array($result2))
				{
					$resultado .= '
							<tr>
								<td colspan="3"></td>
								<td class="GridLine'.$i.'" align="right">'.$row2["Mascles"].'</td>
								<td class="GridLine'.$i.'" colspan="4" align="left">Mascles</td>
							</tr>				
							<tr>
								<td colspan="3"></td>
								<td class="GridLine'.$i.'" align="right">'.$row2["Femelles"].'</td>
								<td class="GridLine'.$i.'" colspan="4" align="left">Femelles</td>
							</tr>				
					';
				}
			}
		$i++;
		$buit++;
		}
		
	}
	$resultado .= '
	</table>';
//	<hr>';
	
	if ($buit>0) return $resultado;
}
?>