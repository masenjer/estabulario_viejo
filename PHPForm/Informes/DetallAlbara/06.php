<?php
function CarregaDetallComanda6($id)
{
	return '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaHormouCrucesF($id).'</td>
		<td valign="top">'.CarregaHormouCrucesM($id).'</td>
		<td valign="top">'.CarregaHormouCrucesH($id).'</td>
	</tr>
</table>
	<p>'.CarregaHormouCrucesC($id).'</p>
	<p>'.CarregaRecollida($id,1).'</p>
	<p>'.MostraCaixes($id).'</p>
	
	';
}

function CarregaHormouCrucesF($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF
			FROM HormoyCruces HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSocaF AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="5" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$EUF = SelectSetGramsDies($row["EUF"]);

		$resultado .= '
			<tr class="CapcaGrid" align="left" style="text-align:left;">
				<td colspan="2"><b>Femelles</b></td>
			</tr>
			<tr class="GridLine0">
				<td><b>Especie:</b> </td>
				<td>'.$row["NomEspecie_ca"].'</td>
			</tr>
			<tr class="GridLine1">
				<td><b>Soca:</b> </td>
				<td>'.$row["NomSoca"].'</td>
			</tr>
			<tr class="GridLine0">
				<td><b>Unitats:</b> </td>
				<td>'.$row["CF"].'</td>
			</tr>
			<tr class="GridLine1">
				<td><b>Edat / Pes:</b> </td>
				<td>'.$row["EF"].' '.$EUF.'</td>
			</tr>
		';
	}		

	$resultado .= '</table>';
	
	
	return $resultado;
}

function CarregaHormouCrucesM($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EM, HC.EUM, HC.CM, HC.CF, HC.V
			FROM HormoyCruces HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSocaM AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="5" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$EUM = SelectSetGramsDies($row["EUM"]);

		if ($row["V"] == "1") $V = "Vasectomitzats";
		else $V = "Sencers";
		
		$CM = $row["CF"] / $row["CM"] ;
		
		$resultado .= '
			<tr class="CapcaGrid" align="left" style="text-align:left;">
				<td colspan="2"><b>Mascles ('.$V.')</b></td>
			</tr>
			<tr class="GridLine0">
				<td><b>Especie:</b> </td>
				<td>'.$row["NomEspecie_ca"].'</td>
			</tr>
			<tr class="GridLine1">
				<td><b>Soca:</b> </td>
				<td>'.$row["NomSoca"].'</td>
			</tr>
			<tr class="GridLine0">
				<td><b>Unitats:</b> </td>
				<td>'.$CM.'</td>
			</tr>
			<tr class="GridLine1">
				<td><b>Edat / Pes:</b> </td>
				<td>'.$row["EM"].' '.$EUM.'</td>
			</tr>
		';
	}		
	
	$resultado .= '</table>';
	
	
	return $resultado;
}

function CarregaHormouCrucesH($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT HC.VH1, HC.FH1, HC.HH1,HC.VH2, HC.FH2, HC.HH2
			FROM HormoyCruces HC
			WHERE  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="3" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{

		$resultado .= '
			<tr class="CapcaGrid" align="left" style="text-align:left;">
				<td colspan="2"><b>Hormona 1</b></td>
			</tr>
			<tr class="GridLine0">
				<td style="padding-left:20px;"><b>Volum:</b> </td>
				<td>'.$row["VH1"].' ml.</td>
			</tr>
			<tr class="GridLine1">
				<td style="padding-left:20px;"><b>Data:</b> </td>
				<td>'.SelectFecha($row["FH1"]).'</td>
			</tr>
			<tr class="GridLine0">
				<td style="padding-left:20px;"><b>Hora:</b> </td>
				<td>'.$row["HH1"].'</td>
			</tr>
		</table><br>
		<table cellpadding="3" cellspacing="0" border="0" style="border:1px solid #9e9885">
			<tr class="CapcaGrid" align="left" style="text-align:left;">
				<td colspan="2"><b>Hormona 2</b></td>
			</tr>
			<tr class="GridLine0">
				<td style="padding-left:20px;"><b>Volum:</b> </td>
				<td>'.$row["VH2"].' ml.</td>
			</tr>
			<tr class="GridLine1">
				<td style="padding-left:20px;"><b>Data:</b> </td>
				<td>'.SelectFecha($row["FH2"]).'</td>
			</tr>
			<tr class="GridLine0">
				<td style="padding-left:20px;"><b>Hora:</b> </td>
				<td>'.$row["HH2"].'</td>
			</tr>
		';
	}		
	
	$resultado .= '</table>';
	
	
	return $resultado;
}

function CarregaHormouCrucesC($id)
{
	include("../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT HC.FC, HC.HC, M.MTVD, M.MTVH, S.FS, HC.Estado, HC.IdHormoyCruces
			FROM HormoyCruces HC, MTV M, Separar S
			WHERE  
					M.IdComandaCap = HC.IdComandaCap
			AND		S.IdComandaCap = HC.IdComandaCap
			AND		HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	//echo $SQL;

	$resultado = '<table cellpadding="3" cellspacing="0" border="0">';
	
	while ($row = mysql_fetch_array($result))
	{

		$resultado .= '
			<tr>
				<td><b>Data de l\'encreuament: </b>'.SelectFecha($row["FC"]).' a les '.$row["HC"].' h</td>
			</tr>
		';
		if ($row["MTVD"] == 0) $resultado .= '<tr><td><b>No mirar </b>taps vaginals</td></tr>';
		else $resultado .= '
			<tr>
				<td><b>Mirar</b> taps vaginals des del dia '.SelectFecha($row["MTVD"]).' fins al dia '.SelectFecha($row["MTVH"]).'</td>
			</tr>
			';
		if ($row["FS"] == 0) $resultado .= '<tr><td><b>No Separar </b></td></tr>';
		else $resultado .= '
			<tr>
				<td><b>Separar</b> el dia '.SelectFecha($row["FS"]).'</td>
			</tr>';
		 $resultado .= '
			';
	}		
	
	$resultado .= '</table>';
	
	
	return $resultado;
}
?>