<?php
function CarregaDetallComanda6($id)
{
	return '
<table cellspacing="10" border="0" style="border-style:solid; border-width=1px; border-color:#FFF">
	<tr>
		<td style="border:1 #000 solid">'.MostraEtiquetaHyCH1($id).'</td>
		<td width="40px"></td>
		<td style="border:1 #000 solid">'.MostraEtiquetaHyCH2($id).'</td>
	</tr>
	<tr>
		<td colspan="2" height="40px"></td>
	</tr>
	<tr>
		<td style="border:1 #000 solid">'.MostraEtiquetaHyCC($id).'</td>
		<td width="40px"></td>
		<td style="border:1 #000 solid">'.MostraEtiquetaHyCR($id).'</td>
	</tr>
</table>
	';
}

function MostraEtiquetaHyCH1($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$dias = array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF, P.NumProc, Pr.Projecte, HC.FH1, HC.HH1, HC.VH1, U.Nom, U.Cognoms
			FROM HormoyCruces HC, Soca S, Especie E, ComandaCap CC, Procediment P , Projecte Pr, Users U
			WHERE E.IdEspecie = S.IdEspecie 
			AND S.IdSoca = HC.IdSocaF 
			AND CC.IdComandaCap = HC.IdComandaCap
			AND P.IdProcediment = CC.IdProcediment 
			AND Pr.IdProjecte = CC.IdProjecte
			AND U.IdUser = CC.IdUsuari
			AND HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="10" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$fecha = $dias[date("w", strtotime($row["FH1"]))];
		
		$resultado .= '
			<tr>
				<td><b>DIA:</b> </td>
				<td>'.$fecha.', '.SelectFecha($row["FH1"]).'</td>
			</tr>
			<tr>
				<td><b>HORA:</b> </td>
				<td>'.$row["HH1"].'</td>
			</tr>
			<tr>
				<td colspan="2"><b>ADMINISTRAR HORMONA 1</b></td>
			</tr>
			<tr>
				<td><b>QUANTITAT:</b> </td>
				<td>'.$row["VH1"].'</td>
			</tr>
			<tr>
				<td><b>ANIMALS:</b> </td>
				<td>'.$row["CF"].' '.$row["NomEspecie_ca"].' '.$row["NomSoca"].'</td>
			</tr>
			<tr>
				<td><b>CEEAH:</b> </td>
				<td>'.$row["NumProc"].'</td>
			</tr>
			<tr>
				<td><b>CC:</b> </td>
				<td>'.$row["Projecte"].'</td>
			</tr>
			<tr>
				<td><b>Usuari:</b> </td>
				<td>'.$row["Nom"].' '.$row["Cognoms"].'</td>
			</tr>
		';
	}		

	$resultado .= '</table>';
	
	
	return $resultado;
}

function MostraEtiquetaHyCH2($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$dias = array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF, P.NumProc, Pr.Projecte, HC.FH1, HC.FH2, HC.HH2, HC.VH2, U.Nom, U.Cognoms
			FROM HormoyCruces HC, Soca S, Especie E, ComandaCap CC, Procediment P , Projecte Pr, Users U
			WHERE E.IdEspecie = S.IdEspecie 
			AND S.IdSoca = HC.IdSocaF 
			AND CC.IdComandaCap = HC.IdComandaCap
			AND P.IdProcediment = CC.IdProcediment 
			AND Pr.IdProjecte = CC.IdProjecte
			AND U.IdUser = CC.IdUsuari
			AND HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="10" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$fecha = $dias[date("w", strtotime($row["FH2"]))];
		
		$resultado .= '
			<tr>
				<td><b>DIA:</b> </td>
				<td>'.$fecha.', '.SelectFecha($row["FH2"]).'</td>
			</tr>
			<tr>
				<td><b>HORA:</b> </td>
				<td>'.$row["HH2"].'</td>
			</tr>
			<tr>
				<td colspan="2"><b>ADMINISTRAR HORMONA 2</b></td>
			</tr>
			<tr>
				<td><b>QUANTITAT:</b> </td>
				<td>'.$row["VH2"].'</td>
			</tr>
			<tr>
				<td><b>ANIMALS:</b> </td>
				<td>'.$row["CF"].' '.$row["NomEspecie_ca"].' '.$row["NomSoca"].'</td>
			</tr>
			<tr>
				<td><b>CEEAH:</b> </td>
				<td>'.$row["NumProc"].'</td>
			</tr>
			<tr>
				<td><b>CC:</b> </td>
				<td>'.$row["Projecte"].'</td>
			</tr>
			<tr>
				<td><b>Usuari:</b> </td>
				<td>'.$row["Nom"].' '.$row["Cognoms"].'</td>
			</tr>
		';
	}		

	$resultado .= '</table>';
	
	
	return $resultado;
}

function MostraEtiquetaHyCC($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$dias = array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
	
	$SQL = "SELECT SF.NomSoca as NomSocaF, SM.NomSoca as NomSocaM, E.NomEspecie_ca, HC.EF, HC.EUF, HC.EM, HC.EUM, HC.CF,HC.CM, HC.HC, HC.FC, HC.IdComandaCap, Pr.Projecte , U.Nom, U.Cognoms, P.NumProc
			FROM HormoyCruces HC 
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		Projecte Pr
							ON 				CC.IdProjecte = Pr.IdProjecte
							INNER JOIN 		Procediment P
							ON 				P.IdProcediment = CC.IdProcediment
							INNER JOIN 		Users U
							ON 				U.IdUser = CC.IdUsuari
							)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			INNER JOIN 		(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON SF.IdSoca = HC.IdSocaF
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			
			WHERE 	HC.IdComandaCap = '".$id."'
			AND 	HC.Estado = 1
			ORDER BY Pr.Projecte, HC.HC, IdComandaCap	ASC		
			"; 
	$result = mysql_query($SQL,$oConn);
	
	//echo $SQL;

	$resultado = '<table cellpadding="10" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$fecha = $dias[date("w", strtotime($row["FC"]))];
		
		$resultado .= '
			<tr>
				<td><b>DIA:</b> </td>
				<td>'.$fecha.', '.SelectFecha($row["FC"]).'</td>
			</tr>
			<tr>
				<td><b>HORA:</b> </td>
				<td>'.$row["HC"].'</td>
			</tr>
			<tr>
				<td colspan="2"><b>ACOBLAR</b></td>
			</tr>
			<tr>
				<td><b>ANIMALS:</b> </td>
				<td>'.$row["CF"].' '.$row["NomEspecie_ca"].' '.$row["NomSocaF"].'</td>
			</tr>
			<tr>
				<td><b>FEMELLES <br>PER MASCLE:</b> </td>
				<td>'.$row["CM"].' '.$row["NomEspecie_ca"].' '.$row["NomSocaM"].'</td>
			</tr>
			<tr>
				<td><b>CEEAH:</b> </td>
				<td>'.$row["NumProc"].'</td>
			</tr>
			<tr>
				<td><b>CC:</b> </td>
				<td>'.$row["Projecte"].'</td>
			</tr>
			<tr>
				<td><b>Usuari:</b> </td>
				<td>'.$row["Nom"].' '.$row["Cognoms"].'</td>
			</tr>
		';
	}		

	$resultado .= '</table>';
	
	
	return $resultado;
}

function MostraEtiquetaHyCR($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$dias = array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
	
	$SQL = "SELECT R.Hora, R.Fecha, HC.IdComandaCap, Pr.Projecte, U.Nom, U.Cognoms, M.MTVD, M.MTVH, S.FS,  HC.IdHormoyCruces 
			FROM HormoyCruces HC 
			
			INNER JOIN 		(ComandaCap CC 
							LEFT JOIN 		Projecte Pr
							ON 				CC.IdProjecte = Pr.IdProjecte
							INNER JOIN 		Users U
							ON 				U.IdUser = CC.IdUsuari)
			ON 				CC.IdComandaCap = HC.IdComandaCap
			
			INNER JOIN 		(Soca SF
							INNER JOIN 	Especie E
							ON			E.IdEspecie = SF.IdEspecie)		
			ON 				SF.IdSoca = HC.IdSocaF
			
			LEFT JOIN 		MTV M 
			ON 				M.IdComandaCap = HC.IdComandaCap 	
			
			LEFT JOIN		Separar S	
			ON				S.IdComandaCap = HC.IdComandaCap 
			
			INNER JOIN 	Soca SM
			ON SM.IdSoca = HC.IdSocaM
			
			INNER JOIN 	Recollida R
			ON R.IdComandaCap = HC.IdComandaCap
			
			WHERE CC.IdComandaCap = ".$id."
			ORDER BY Pr.Projecte, R.Hora, IdComandaCap ASC		
			"; 
	$result = mysql_query($SQL,$oConn);
	
	//echo $SQL;

	$resultado = '<table cellpadding="10" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$fecha = $dias[date("w", strtotime($row["Fecha"]))];
		$fechaMTD = $dias[date("w", strtotime($row["MTVD"]))];
		$fechaMTH = $dias[date("w", strtotime($row["MTVH"]))];
		$fechaS = $dias[date("w", strtotime($row["FS"]))];
		
		
		$resultado .= '
			<tr>
				<td><b>MIRAR TAPONES:</b> </td>
				<td></td>
			</tr>
			<tr>
				<td><b>Desde:</b> </td>
				<td>'.$fechaMTD.' '.SelectFecha($row["MTVD"]).'</td>
			</tr>
			<tr>
				<td><b>Hasta:</b> </td>
				<td>'.$fechaMTH.' '.SelectFecha($row["MTVH"]).'</td>
			</tr>
			<tr>
				<td><b>SEPARAR:</b> </td>
				<td>'.$fechaS.' '.SelectFecha($row["FS"]).'</td>
			</tr>
			<tr>
				<td><b>DIA DE RECOLLIDA:</b> </td>
				<td>'.$fecha.', '.SelectFecha($row["Fecha"]).'</td>
			</tr>
			<tr>
				<td><b>HORA:</b> </td>
				<td>'.$row["Hora"].'</td>
			</tr>
			<tr>
				<td><b>Usuari:</b> </td>
				<td>'.$row["Nom"].' '.$row["Cognoms"].'</td>
			</tr>
		';
	}		

	$resultado .= '</table>';
	
	
	return $resultado;
}

?>