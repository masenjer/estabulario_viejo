<?php
function InfoData01($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado= '

<p>Petici&oacute; d\'animals produ&iuml;ts al Servei d\'Estabulari</p>


<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Tipus</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>NProc</b></td>
		<td class="CapcaGrid"><b>Data Naixement / Arribada</b></td>
		<td class="CapcaGrid"><b>Sexe</b></td>
	</tr>
';
			
	$SQL = "SELECT PP.IdPetAnimProd,E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.FechaNac, PP.Sexo, PP.Estado, S.IdSoca, P.NumProc, R.Hora, R.Tipus, PP.IdComandaCap 
			FROM PetAnimProd PP, Especie E, Soca S, Procediment P, Recollida R  
			WHERE 
						E.IdEspecie = S.IdEspecie 
			AND 		S.IdSoca = PP.IdSoca 
			AND 		PP.IdProcediment = P.IdProcediment 
			AND 		R.IdComandaCap = PP.IdComandaCap
			AND 		R.Fecha = '".$fecha."'
			AND 		PP.Estado = 1
			ORDER BY	R.Hora, PP.IdComandaCap ASC
			"; 
	$result = mysql_query($SQL,$oConn);
	
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		
		if ($row["Tipus"] == 1) $tipus = " Recollits";
		else $tipus = "Emprats";

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
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$tipus.'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NumProc"].'</td>
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