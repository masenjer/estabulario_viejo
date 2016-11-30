<?php
function InfoData08($fecha)
{
include("../../rao/EstabulariForm_con.php");

$resultado = '
<p>G&agrave;bies i animals</p>
';

$resultado1 = RAnimals08($fecha);
$resultado2 = RGavies08($fecha);
$resultado3 = DAnimals08($fecha);
$resultado4 = DGavies08($fecha);

if($resultado1||$resultado2||$resultado3||$resultado4) 
	return $resultado.$resultado1.$resultado2.$resultado3.$resultado4;	
}

function RAnimals08($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Recollida d\' Animals</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Tipus</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>RatonID</b></td>
	</tr>
';

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.RatonID, HC.Cantidad,R.Hora,HC.IdComandaCap, R.Fecha, Pr.Projecte, R.Fecha, Pr.Projecte, I.Nom, I.Cognoms
			
			FROM JaulasAnimLin HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 	(Soca S
							INNER JOIN 	Especie E
							ON			E.IdEspecie = S.IdEspecie)		
			ON 			S.IdSoca = HC.IdSoca
			
			INNER JOIN 	Recollida R
			ON R.IdComandaCap = HC.IdComandaCap
			
			WHERE 	R.Fecha >= '".$f[0]."' 
			AND		R.Fecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			ORDER BY Pr.Projecte, R.Fecha, R.Hora, HC.IdComandaCap ASC";

//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
			<td class="GridLine'.$i.'">'.$row["RatonID"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	;	
	
}

function RGavies08($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Recollida de G&agrave;bies</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Sala</b></td>
		<td class="CapcaGrid"><b>Posici&oacute;</b></td>
		<td class="CapcaGrid"><b>G&agrave;bia</b></td>
	</tr>
';

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.Sala, HC.Posicion, HC.NumJaula, R.Hora, HC.IdComandaCap, R.Fecha, Pr.Projecte, I.Nom, I.Cognoms
			
			FROM JaulasJaulaLin HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 	(Soca S
							INNER JOIN 	Especie E
							ON			E.IdEspecie = S.IdEspecie)		
			ON 			S.IdSoca = HC.IdSoca
			
			INNER JOIN 	Recollida R
			ON R.IdComandaCap = HC.IdComandaCap
			
			WHERE 	R.Fecha >= '".$f[0]."' 
			AND		R.Fecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			ORDER BY Pr.Projecte, R.Fecha, R.Hora, HC.IdComandaCap ASC";

//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
			
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["Sala"].'</td>
			<td class="GridLine'.$i.'">'.$row["Posicion"].'</td>
			<td class="GridLine'.$i.'">'.$row["NumJaula"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	;	
	
}

function DAnimals08($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Devoluci&oacute; d\' Animals</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>RatonID</b></td>
	</tr>
';

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.RatonID, HC.Cantidad,D.Hora,HC.IdComandaCap, Pr.Projecte, D.Fecha, I.Nom, I.Cognoms
			
			FROM JaulasAnimLin HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 	(Soca S
							INNER JOIN 	Especie E
							ON			E.IdEspecie = S.IdEspecie)		
			ON 			S.IdSoca = HC.IdSoca
			
			INNER JOIN 	Devolucio D
			ON D.IdComandaCap = HC.IdComandaCap
			
			WHERE 	D.Fecha >= '".$f[0]."' 
			AND		D.Fecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			ORDER BY Pr.Projecte, D.Fecha, D.Hora, HC.IdComandaCap ASC";

//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
			<td class="GridLine'.$i.'">'.$row["RatonID"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	;	
	
}

function DGavies08($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	$f = explode("|",$fecha);

	$buit = 0;

	$resultado = '
<p>Devoluci&oacute; de G&agrave;bies</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Projecte</b></td>
		<td class="CapcaGrid"><b>Data</b></td>
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Sala</b></td>
		<td class="CapcaGrid"><b>Posici&oacute;</b></td>
		<td class="CapcaGrid"><b>G&agrave;bia</b></td>
	</tr>
';

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.Sala, HC.Posicion, HC.NumJaula, D.Hora, HC.IdComandaCap, Pr.Projecte, D.Fecha, I.Nom, I.Cognoms
			
			FROM JaulasJaulaLin HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		(Projecte Pr 
											INNER JOIN 	Investigador I
											ON			I.IdInvestigador = Pr.IdInvestigador)
							ON 				CC.IdProjecte = Pr.IdProjecte)
			ON 				CC.IdComandaCap = HC.IdComandaCap

			INNER JOIN 	(Soca S
							INNER JOIN 	Especie E
							ON			E.IdEspecie = S.IdEspecie)		
			ON 			S.IdSoca = HC.IdSoca
			
			INNER JOIN 	Devolucio D
			ON D.IdComandaCap = HC.IdComandaCap
			
			WHERE 	R.Fecha >= '".$f[0]."' 
			AND		R.Fecha <= '".$f[1]."'
			AND 	HC.Estado = 1
			ORDER BY Pr.Projecte, D.Fecha, D.Hora, HC.IdComandaCap ASC";

//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
				
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Projecte"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$row["Sala"].'</td>
			<td class="GridLine'.$i.'">'.$row["Posicion"].'</td>
			<td class="GridLine'.$i.'">'.$row["NumJaula"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return  $resultado.'</table>';	;	
	
}
?>