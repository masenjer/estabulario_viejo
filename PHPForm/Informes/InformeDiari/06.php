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
	
	$resultado = '
<p>Aplicaci&oacute; Hormona 1</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Edat/Pes</b></td>
		<td class="CapcaGrid"><b>Volum H1</b></td>
	</tr>
';


	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF, HC.HH1, HC.VH1, HC.IdComandaCap 
			FROM HormoyCruces HC, Soca S, Especie E 
			WHERE 
					E.IdEspecie = S.IdEspecie 
			AND 	S.IdSoca = HC.IdSocaF 
			AND  	HC.FH1 = '".$fecha."'
			AND 	HC.Estado = 1
			ORDER BY HC.HH1, IdComandaCap	ASC		
			"; 
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		
		$EUF = SelectSetGramsDies($row["EUF"]);
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["HH1"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$EUF.'</td>
			<td class="GridLine'.$i.'">'.$row["VH1"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}

function Hormona2($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado = '
<p>Aplicaci&oacute; Hormona 2</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Edat/Pes</b></td>
		<td class="CapcaGrid"><b>Volum H2</b></td>
	</tr>
';


	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF, HC.HH2, HC.VH2, HC.IdComandaCap 
			FROM HormoyCruces HC, Soca S, Especie E 
			WHERE 
					E.IdEspecie = S.IdEspecie 
			AND 	S.IdSoca = HC.IdSocaF 
			AND  	HC.FH2 = '".$fecha."'
			AND 	HC.Estado = 1
			ORDER BY HC.HH2, IdComandaCap	ASC		
			"; 
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		$EUF = SelectSetGramsDies($row["EUF"]);
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["HH2"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$EUF.'</td>
			<td class="GridLine'.$i.'">'.$row["VH2"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}

function HormoyCrucesCruce($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado = '
<p>Encreuaments hormonats</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>E/P Fem</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
		<td class="CapcaGrid"><b>E/P MAs</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.IdComandaCap 
			FROM HormoyCruces HC 
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			WHERE HC.FC = '".$fecha."'
			AND 	HC.Estado = 1
			ORDER BY HC.HC, IdComandaCap	ASC		
			"; 
	
	//echo $SQL;
	
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		
		$EUM = SelectSetGramsDies($row["EUM"]);
		$EUF = SelectSetGramsDies($row["EUF"]);
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["HC"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaF"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSocaM"].'</td>
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["EF"].' '.$EUF.'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
			<td class="GridLine'.$i.'">'.$row["EM"].' '.$EUM.'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}

function Recollida06($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado = '
<p>Recollida d\' Hormonaci&oacute; i encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Tipus</b></td>
		<td class="CapcaGrid"><b>Estat</b></td>
		<td class="CapcaGrid"><b>M&egrave;tode</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.CF,HC.CM, R.Hora, HC.IdComandaCap, R.Tipus, R. VM, R.Sacrifici  
			FROM HormoyCruces HC 
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	Recollida R
			ON R.IdComandaCap = HC.IdComandaCap
			
			WHERE R.Fecha = '".$fecha."'
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
		
		if ($row["VM"] != 1)
		{
			$VM = "Morts";
			switch($row["Sacrifici"])
			{
				case "1": $sacrifici = "CO2";
						break;
				case "2": $sacrifici = "Dislocaci&oacute; cervical";
						break;
				default: $sacrifici = "ERROR: No indicat";
						break;
			}
		}else { 
				$VM = "Vius";
				$sacrifici = "Vius";
		}
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$tipus.'</td>
			<td class="GridLine'.$i.'">'.$VM.'</td>
			<td class="GridLine'.$i.'">'.$sacrifici.'</td>
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
	if ($buit>0) return '</table>'.$resultado;	
	
}

function SepararHormoyCruces($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado = '
<p>Separar Hormonaci&oacute; i encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.IdComandaCap 
			FROM HormoyCruces HC 
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	Separar S
			ON S.IdComandaCap = HC.IdComandaCap
			
			WHERE 	S.FS = '".$fecha."'
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
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}

function VigilarTapsHormoyCruces($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado = '
<p>Vigilar taps vaginals Hormonaci&oacute; i encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca F</b></td>
		<td class="CapcaGrid"><b>Soca M</b></td>
		<td class="CapcaGrid"><b>UdF</b></td>
		<td class="CapcaGrid"><b>M/F</b></td>
	</tr>
';


	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.IdComandaCap 
			FROM HormoyCruces HC 
			
			INNER JOIN 	(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	MTV
			ON MTV.IdComandaCap = HC.IdComandaCap
			
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
			<td class="GridLine'.$i.'">'.$row["CF"].'</td>
			<td class="GridLine'.$i.'">'.$row["CM"].' </td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}

?>