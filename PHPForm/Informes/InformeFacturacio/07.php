<?php
function InfoData07($fecha)
{
include("../../rao/EstabulariForm_con.php");

$resultado = '
<p>Encreuaments</p>
';

$resultado1 = Cruce07($fecha);
$resultado2 = Recollida07($fecha);
$resultado3 = Separar07($fecha);
$resultado4 = VigilarTaps07($fecha);

if($resultado1||$resultado2||$resultado3||$resultado4) 
	return $resultado.$resultado1.$resultado2.$resultado3.$resultado4;	
}

function Cruce07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado = '
<p>Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Com</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>IdMascle</b></td>
		<td class="CapcaGrid"><b>IdFem1</b></td>
		<td class="CapcaGrid"><b>IdFem2</b></td>
		<td class="CapcaGrid"><b>IdFem3</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, HC.HC, CC.IdComandaCap, Pr.Projecte , HC.FC, I.Nom, I.Cognoms 
			FROM CrucesCap CC 
			
			INNER JOIN 		(ComandaCap CoC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CoC.IdProjecte = Pr.IdProjecte)
			ON 				CoC.IdComandaCap = CC.IdComandaCap
			
			INNER JOIN 	CrucesLin HC 
			ON 			HC.IdCrucesCap = CC.IdCrucesCap
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 			SF.IdSoca = CC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON 			SM.IdSoca = CC.IdSocaM
			
			WHERE 	HC.FC <= '".$f[0]."'
			AND 	HC.FC >= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, HC.FC, HC.HC, IdComandaCap	ASC		
			"; 
	
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
			<td class="GridLine'.$i.'">'.SelectFecha($row["FC"]).'</td>
			<td class="GridLine'.$i.'">'.$row["HC"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaF"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaM"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdSocaM"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdSocaF1"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdSocaF2"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdSocaF3"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

function Recollida07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado = '
<p>Recollida d\' Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Com</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, HC.HC, CC.IdComandaCap, R.Hora, R.Fecha, Pr.Projecte, I.Nom, I.Cognoms  
			FROM CrucesCap CC 
			
			INNER JOIN 		(ComandaCap CoC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CoC.IdProjecte = Pr.IdProjecte)
			ON 				CoC.IdComandaCap = CC.IdComandaCap

			INNER JOIN 	CrucesLin HC 
			ON 			HC.IdCrucesCap = CC.IdCrucesCap
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 			SF.IdSoca = CC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON 			SM.IdSoca = CC.IdSocaM
						
			INNER JOIN 	Recollida R
			ON R.IdComandaCap = CC.IdComandaCap
			
			WHERE 	R.Fecha >= '".$f[0]."' 
			AND		R.Fecha <= '".$f[1]."' 
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY R.Hora, IdComandaCap ASC		
			"; 
	
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
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaF"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaM"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	
	
}

function Separar07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado = '
<p>Separar Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Com</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, CC.IdComandaCap, Pr.Projecte, S.FS, I.Nom, I.Cognoms
			FROM CrucesCap CC 
			
			INNER JOIN 		(ComandaCap CoC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CoC.IdProjecte = Pr.IdProjecte)
			ON 				CoC.IdComandaCap = CC.IdComandaCap

			INNER JOIN 	CrucesLin HC 
			ON 			HC.IdCrucesCap = CC.IdCrucesCap
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 			SF.IdSoca = CC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON 			SM.IdSoca = CC.IdSocaM
			
			INNER JOIN 	Separar S
			ON S.IdComandaCap = CC.IdComandaCap
			
			WHERE	S.FS >= '".$f[0]."'
			AND 	S.FS <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, S.FS, IdComandaCap	ASC		
			"; 
	
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
			<td class="GridLine'.$i.'">'.SelectFecha($row["FS"]).'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaF"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaM"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	
	
}

function VigilarTaps07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado = '
<p>Vigilar taps vaginals Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>Desde</b></td>
		<td class="CapcaGrid"><b>Fins</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, CC.IdComandaCap, Pr.Projecte, MTV.MTVD, MTV.MTVH, I.Nom, I.Cognoms 
			FROM CrucesCap CC 
			
			INNER JOIN 		(ComandaCap CoC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CoC.IdProjecte = Pr.IdProjecte)
			ON 				CoC.IdComandaCap = CC.IdComandaCap

			INNER JOIN 	CrucesLin HC 
			ON 			HC.IdCrucesCap = CC.IdCrucesCap
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 			SF.IdSoca = CC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON 			SM.IdSoca = CC.IdSocaM
			
			INNER JOIN 	MTV
			ON MTV.IdComandaCap = CC.IdComandaCap
			
			WHERE 	MTV.MTVD >= '".$f[0]."'
			AND		MTV.MTVH <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, MTV.MTVD, IdComandaCap	ASC		
			"; 
	
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
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaF"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaM"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["MTVD"]).'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["MTVH"]).'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	
	
}

?>