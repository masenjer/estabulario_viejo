<?php
function InfoData06($fecha)
{
include("../../rao/EstabulariForm_con.php"); 

$resultado = '
<p>Hormonaci&oacute; i encreuaments</p>
';

$resultado1 = Hormona1($fecha);
$resultado2 = Hormona2($fecha);
$resultado3 = HormoyCrucesCruce($fecha);
$resultado4 = Recollida06($fecha);
$resultado5 = SepararHormoyCruces($fecha);
$resultado6 = VigilarTapsHormoyCruces($fecha);  

if($resultado1||$resultado2||$resultado3||$resultado4||$resultado5||$resultado6) 
	return $resultado.$resultado1.$resultado2.$resultado3.$resultado4.$resultado5.$resultado6;	

}

function Hormona1($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	$f = explode("|",$fecha);
	
	$resultado = '
<p>Aplicaci&oacute; Hormona 1</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Uds</b></td>
		<td class="CapcaGrid"><b>Edat/Pes</b></td>
		<td class="CapcaGrid"><b>V.H1</b></td>
	</tr>
';


	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF, HC.HH1, HC.FH1, HC.VH1, HC.IdComandaCap, HC.FH1, Pr.Projecte, I.Nom, I.Cognoms 
			FROM HormoyCruces HC 
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			INNER JOIN 		(Soca S 
							INNER JOIN 	Especie E 
							ON 			E.IdEspecie = S.IdEspecie)
			ON				S.IdSoca = HC.IdSocaF

			WHERE 
						HC.FH1 >= '".$f[0]."'
			AND  		HC.FH1 <= '".$f[1]."'
			AND 		HC.Estado = 1
			".$f[2]."
			ORDER BY 	Pr.Projecte, HC.FH1, HC.HH1, IdComandaCap	ASC		
			"; 
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		
		if ($row["EUF"] == "0") $Unitats = "set";
		else $Unitats = "gr";
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["FH1"]).'</td>
			<td class="GridLine'.$i.'">'.$row["HH1"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$Unitats.'</td>
			<td class="GridLine'.$i.'">'.$row["VH1"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

function Hormona2($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado = '
<p>Aplicaci&oacute; Hormona 2</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Edat/Pes</b></td>
		<td class="CapcaGrid"><b>V.H2</b></td>
	</tr>
';


	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF, HC.FH2, HC.HH2, HC.VH2, HC.IdComandaCap, Pr.Projecte , I.Nom, I.Cognoms
			FROM HormoyCruces HC 
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			INNER JOIN 		(Soca S 
							INNER JOIN 	Especie E 
							ON 			E.IdEspecie = S.IdEspecie)
			ON				S.IdSoca = HC.IdSocaF

			WHERE 
						HC.FH2 >= '".$f[0]."'
			AND  		HC.FH2 <= '".$f[1]."'
			AND 		HC.Estado = 1
			".$f[2]."
			ORDER BY 	Pr.Projecte, HC.HH2, IdComandaCap	ASC		
			"; 
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		
		if ($row["EUF"] == "0") $Unitats = "set";
		else $Unitats = "gr";
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Nom"].'<br>'.$row["Cognoms"].'</td>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["FH2"]).'</td>
			<td class="GridLine'.$i.'">'.$row["HH2"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$Unitats.'</td>
			<td class="GridLine'.$i.'">'.$row["VH2"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

function HormoyCrucesCruce($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado = '
<p>Encreuaments hormonats</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.FC, HC.IdComandaCap, Pr.Projecte, I.Nom, I.Cognoms 
			FROM HormoyCruces HC 
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			INNER JOIN 		(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			WHERE 	HC.FC >= '".$f[0]."'
			AND 	HC.FC <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, HC.HC, IdComandaCap	ASC		
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
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

function Recollida06($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado = '
<p>Recollida d\' Hormonaci&oacute; i Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.CF,HC.CM, R.Hora, R.Fecha, HC.IdComandaCap, Pr.Projecte, I.Nom, I.Cognoms 
			FROM HormoyCruces HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			
			INNER JOIN 		(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 				SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	Recollida R
			ON R.IdComandaCap = HC.IdComandaCap
			
			WHERE R.Fecha >= '".$f[0]."'
			AND   R.Fecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, R.Hora, IdComandaCap ASC		
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
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

function SepararHormoyCruces($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado = '
<p>Separar Hormonaci&oacute; i encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.IdComandaCap , S.FS, Pr.Projecte, I.Nom, I.Cognoms
			FROM HormoyCruces HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	Separar S
			ON S.IdComandaCap = HC.IdComandaCap
			
			WHERE 	S.FS >= '".$f[0]."'
			AND 	S.FS <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, IdComandaCap	ASC		
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
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

function VigilarTapsHormoyCruces($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;
	$f = explode("|",$fecha);

	$resultado = '
<p>Vigilar taps vaginals Hormonaci&oacute; i encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Investigador</b></td>
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.IdComandaCap, Pr.Projecte, MTV.MTVD, MTV.MTVH, I.Nom, I.Cognoms 
	
			FROM HormoyCruces HC 
			
			INNER JOIN 		(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	MTV
			ON MTV.IdComandaCap = HC.IdComandaCap
			
			WHERE 	MTV.MTVD >= '".$f[0]."'
			AND		MTV.MTVH <= '".$f[1]."'
			AND 	HC.Estado = 1
			".$f[2]."
			ORDER BY Pr.Projecte, IdComandaCap	ASC		
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
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return $resultado.'</table>';	
	
}

?>