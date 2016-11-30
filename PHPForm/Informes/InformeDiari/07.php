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
	
	$resultado = '
<p>Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>C</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>IdMascle</b></td>
		<td class="CapcaGrid"><b>IdFem1</b></td>
		<td class="CapcaGrid"><b>IdFem2</b></td>
		<td class="CapcaGrid"><b>IdFem3</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, HC.HC, CC.IdComandaCap 
			FROM CrucesCap CC 
			
			INNER JOIN 	CrucesLin HC 
			ON 			HC.IdCrucesCap = CC.IdCrucesCap
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 			SF.IdSoca = CC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON 			SM.IdSoca = CC.IdSocaM
			
			WHERE 	HC.FC = '".$fecha."'
			AND 	HC.Estado = 1
			ORDER BY HC.HC, IdComandaCap	ASC		
			"; 
	
//	$resultado .= '<tr><td coslpan = "9">'.$SQL.'</td></tr>';
	
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		$resultado .= '
		<tr>
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
	return '</table>'.$resultado;	
	
}

function Recollida07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	
	$resultado = '
<p>Recollida d\' Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Tipus</b></td>
		<td class="CapcaGrid"><b>C</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>IdMascle</b></td>
		<td class="CapcaGrid"><b>IdFem1</b></td>
		<td class="CapcaGrid"><b>IdFem2</b></td>
		<td class="CapcaGrid"><b>IdFem3</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, HC.HC, CC.IdComandaCap, R.Hora  
			FROM CrucesCap CC 
			
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
			
			WHERE 	R.Fecha = '".$fecha."' 
			AND 	HC.Estado = 1
			ORDER BY R.Hora, IdComandaCap ASC		
			"; 
	
	//echo $SQL;
	
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		if ($row["Tipus"] == 1) $tipus = " Recollits";
		else $tipus = "Emprats";
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$tipus.'</td>
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
	if ($buit>0) return '</table>'.$resultado;	
	
}

function Separar07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	
	$resultado = '
<p>Separar Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
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


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, CC.IdComandaCap
			FROM CrucesCap CC 
			
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
			
			WHERE	S.FS = '".$fecha."'
			AND 	HC.Estado = 1
			ORDER BY IdComandaCap	ASC		
			"; 
	
	//echo $SQL;
	
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		
		
		$resultado .= '
		<tr>
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
	if ($buit>0) return '</table>'.$resultado;	
	
}

function VigilarTaps07($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	
	$resultado = '
<p>Vigilar taps vaginals Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>IdMascle</b></td>
		<td class="CapcaGrid"><b>IdFemella1</b></td>
		<td class="CapcaGrid"><b>IdFemella2</b></td>
		<td class="CapcaGrid"><b>IdFemella3</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.IdSocaM, HC.IdSocaF1, HC.IdSocaF2, HC.IdSocaF3, CC.IdComandaCap 
			FROM CrucesCap CC 
			
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
			
			WHERE 	MTV.MTVD <= '".$fecha."'
			AND		MTV.MTVH >= '".$fecha."'
			AND 	HC.Estado = 1
			ORDER BY IdComandaCap	ASC		
			"; 
	
	//echo $SQL;
	
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		
		
		$resultado .= '
		<tr>
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
	if ($buit>0) return '</table>'.$resultado;	
	
}

?>