<?php
function InfoData03($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	
	$resultado= '

<p><b>Recollida/Utilitzaci&oacute; d\'animals comprats a prove&iuml;dor</b>
</p>
';
	$resultado1 = '

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Tipus</b></td>
		<td class="CapcaGrid"><b>CEEAH</b></td>
		<td class="CapcaGrid"><b>IP</b></td>
		<td class="CapcaGrid"><b>n&deg;C</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Prove&iuml;dor</b></td>
		<td class="CapcaGrid"><b>n&deg;M</b></td>
		<td class="CapcaGrid"><b>Edat/Pes M</b></td>
		<td class="CapcaGrid"><b>n&deg;F</b></td>
		<td class="CapcaGrid"><b>Edat/Pes F</b></td>
	</tr>
';
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.IdProv, PP.CantidadM, PP.EM, PP.EUM, PP.CantidadF, PP.EF, PP.EUF, PP.IdCompraAnim, PP.Estado, R.Hora, R.Tipus, PP.IdComandaCap, P.NomProveidor, Pr.NumProc, I.Nom,I.Cognoms   
			FROM CompraAnim PP, Especie E, Soca S, Proveidor P, Recollida R, ComandaCap CC, Procediment Pr,Investigador I, Projecte Pj    
			WHERE 		E.IdEspecie = S.IdEspecie 
			AND 		S.IdSoca = PP.IdSoca 			
			AND 		P.IdProveidor = IdProv 
			AND 		R.IdComandaCap = PP.IdComandaCap
			AND 		R.Fecha = '".$fecha."'
			AND 		PP.Estado = 1
			AND 		CC.IdComandaCap = PP.IdComandaCap 
			AND 		Pr.IdProcediment = CC.IdProcediment 
			AND 		Pj.IdProjecte = CC.IdProjecte	
			AND 		I.IdInvestigador = Pj.IdInvestigador 

			ORDER BY	R.Hora, PP.IdComandaCap ASC
			"; 
	if(!$result = mysql_query($SQL,$oConn))die('Consulta no válida: ' . mysql_error());
	
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		
		if ($row["Tipus"] == 1) $tipus = " Recollits";
		else $tipus = "Emprats";

		$i%=2;
				
		if ($row["Estado"]=="1" )
		{
			$EUM = SelectSetGramsDies($row["EUM"]);
			$EUF = SelectSetGramsDies($row["EUF"]);

			$resultado1 .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$tipus.'</td>
			<td class="GridLine'.$i.'">'.$row["NumProc"].'</td>
			<td class="GridLine'.$i.'">'.$row["Nom"].' '.$row["Cognoms"].'</td>
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
	
	if ((InfoData03Proveidor($fecha) != "") || ($buit >0)) return $resultado;
}

function InfoData03Proveidor($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	
	$resultado= '

<p>Arribada d\' animals del prove&iuml;dor</p>



<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
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
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.IdProv, PP.CantidadM, PP.EM, PP.EUM, PP.CantidadF, PP.EF, PP.EUF, PP.IdCompraAnim, PP.Estado, PP.IdComandaCap, P.NomProveidor  
			FROM CompraAnim PP, Especie E, Soca S, Proveidor P, ArribadaProveidor AP  
			WHERE 		E.IdEspecie = S.IdEspecie 
			AND 		S.IdSoca = PP.IdSoca 			
			AND 		P.IdProveidor = IdProv 
			AND 		AP.IdComandaCap = PP.IdComandaCap
			AND 		AP.Fecha = '".$fecha."'
			
			ORDER BY	P.NomProveidor, PP.IdComandaCap ASC
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