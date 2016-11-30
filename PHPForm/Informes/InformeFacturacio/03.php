<?php
function InfoData03($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado= '

<p>Petici&oacute; de Compra d\' Animals</p>
';
/*	$resultado1 = '

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Prove&iuml;dor</b></td>
		<td class="CapcaGrid"><b>Quant M</b></td>
		<td class="CapcaGrid"><b>Edat/Pes M</b></td>
		<td class="CapcaGrid"><b>Quant F</b></td>
		<td class="CapcaGrid"><b>Edat/Pes F</b></td>
	</tr>
';
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.IdProv, PP.CantidadM, PP.EM, PP.EUM, PP.CantidadF, PP.EF, PP.EUF, PP.IdCompraAnim, PP.Estado, R.Hora, R.Tipus, PP.IdComandaCap, P.NomProveidor , R.Fecha 
			FROM CompraAnim PP, Especie E, Soca S, Proveidor P, Recollida R  
			WHERE 		E.IdEspecie = S.IdEspecie 
			AND 		S.IdSoca = PP.IdSoca 			
			AND 		P.IdProveidor = IdProv 
			AND 		R.IdComandaCap = PP.IdComandaCap
			AND 		R.Fecha >= '".$f[0]."'
			AND 		R.Fecha <= '".$f[1]."'
			AND 		PP.Estado = 1
			ORDER BY	R.Fecha, R.Hora, PP.IdComandaCap ASC
			"; 
	$result = mysql_query($SQL,$oConn);
	
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
				
		if ($row["Estado"]=="1" )
		{
			if($row["EUM"] == 0) $EUM = "Setmanes";
			else $EUM = "Grams";
			
			if($row["EUF"] == 0) $EUF = "Setmanes";
			else $EUF = "Grams";

			$resultado1 .= '
		<tr>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomProveidor"].'</td>
			<td class="GridLine'.$i.'">'.$row["CantidadM"].'</td>
			<td class="GridLine'.$i.'">'.$row["EM"].' '.$EUM.'</td>
			<td class="GridLine'.$i.'">'.$row["CantidadF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$EUF.'</td>
		</tr>
	';
			$i++;
			$buit++; 
		}
	}
	
	
	$resultado1 .= '
	</table>';
	
	if ($buit > 0) $resultado .= $resultado1;
	
	$resultado .= InfoData03Proveidor($fecha);
*/	
	
	$resultado = InfoData03Proveidor($fecha);
	
	if ((InfoData03Proveidor($fecha) != "") || ($buit >0)) return $resultado;
}

function InfoData03Proveidor($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	$f = explode("|",$fecha);

	$buit = 0;
	
	$resultado= '

<p>Arribada d\' animals del prove&iuml;dor</p>



<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Prove&iuml;dor</b></td>
		<td class="CapcaGrid"><b>Quant M</b></td>
		<td class="CapcaGrid"><b>Edat/Pes M</b></td>
		<td class="CapcaGrid"><b>Quant F</b></td>
		<td class="CapcaGrid"><b>Edat/Pes F</b></td>
	</tr>
';
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.IdProv, PP.CantidadM, PP.EM, PP.EUM, PP.CantidadF, PP.EF, PP.EUF, PP.IdCompraAnim, PP.Estado, PP.IdComandaCap, P.NomProveidor, AP.Fecha, Pr.Projecte, I.Nom, I.Cognoms  
			FROM CompraAnim PP  
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
			INNER JOIN		Proveidor P
			ON				P.IdProveidor = PP.IdProv
			INNER JOIN		ArribadaProveidor AP
			ON				AP.IdComandaCap = PP.IdComandaCap

			WHERE
				 		AP.Fecha >= '".$f[0]."'
			AND 		AP.Fecha <= '".$f[1]."'
			".$f[2]."
			ORDER BY	Pr.Projecte, AP.Fecha, P.NomProveidor, PP.IdComandaCap ASC
			"; 
	$result = mysql_query($SQL,$oConn);
	//echo $SQL;
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
				
		if ($row["Estado"]=="1" )
		{
			
			$EUM = SelectSetGramsDies($row["EUM"]);
			$EUF = SelectSetGramsDies($row["EUF"]);

			$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomProveidor"].'</td>
			<td class="GridLine'.$i.'">'.$row["CantidadM"].'</td>
			<td class="GridLine'.$i.'">'.$row["EM"].' '.$EUM.'</td>
			<td class="GridLine'.$i.'">'.$row["CantidadF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$EUF.'</td>
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