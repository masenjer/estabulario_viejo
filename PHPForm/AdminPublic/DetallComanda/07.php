<?php
function CarregaDetallComanda7($id)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaCrucesF($id).'</td>
		<td valign="top">'.CarregaCrucesM($id).'</td>
		<td valign="top">'.CarregaCrucesC($id).'</td>
	</tr>
	<tr>
		<td colspan="3">'.CarregaCrucesLin($id).'</td>
	</tr>
	<tr>
		<td colspan="3">'.CarregaRecollida($id,"0").'</td>
	</tr>	
	<tr>
		<td colspan="3">'.MostraCaixes($id).'</td>
	</tr>
</table>
	';
}

function CarregaCrucesF($id)
{
	include("../../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EF, HC.EUF, HC.CF
			FROM CrucesCap HC, Soca S, Especie E 
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
			<tr class="GridLine1">
				<td><b>Edat / Pes:</b> </td>
				<td>'.$row["EF"].' '.$EUF.'</td>
			</tr>
		';
	}		
	
	$resultado .= '</table>';
	
	
	return $resultado;
}

function CarregaCrucesM($id)
{
	include("../../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EM, HC.EUM, HC.CM, HC.V
			FROM CrucesCap HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSocaM AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="5" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$EUM = SelectSetGramsDies($row["EUM"]);

		if ($row["V"] == "1") $V = "Vasectomitzats";
		else $V = "Sencers";

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
			<tr class="GridLine1">
				<td><b>Edat / Pes:</b> </td>
				<td>'.$row["EM"].' '.$EUM.'</td>
			</tr>
		';
	}	
	
	$resultado .= '</table>';
		
	return $resultado;
}

function CarregaCrucesC($id)
{
	include("../../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT  M.MTVD, M.MTVH, S.FS
			FROM  MTV M, Separar S
			WHERE  
					M.IdComandaCap = S.IdComandaCap
			AND		S.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	//echo $SQL;

	$resultado = '<table cellpadding="3" cellspacing="0" border="0">';
	
	while ($row = mysql_fetch_array($result))
	{

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
			</tr>
			';
	}		
	
	$resultado .= '</table>';
	
	
	return $resultado;
}

function CarregaCrucesLin($id)
{
	include("../../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT IdCrucesCap
			FROM CrucesCap 
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$IdCC = $row["IdCrucesCap"];
	}
		
		
	$SQL = "SELECT *
			FROM CrucesLin 
			WHERE IdCrucesCap = ".$IdCC; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '
<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">
	<tr class="CapcaGrid" align="left" style="text-align:left;">
		<td><b>Id Mascle</b></td>
		<td><b>Id Femella 1</b></td>
		<td><b>Id Femella 2</b></td>
		<td><b>Id Femella 3</b></td>
		<td><b>Data</b></td>
		<td><b>Hora</b></td>
		<td><b>Estat</b></td>
	</tr>';
	
	$i=1;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
	<tr>
		<td class="GridLine'.$i.'">'.$row["IdSocaM"].'</td>
		<td class="GridLine'.$i.'">'.$row["IdSocaF1"].'</td>
		<td class="GridLine'.$i.'">'.$row["IdSocaF2"].'</td>
		<td class="GridLine'.$i.'">'.$row["IdSocaF3"].'</td>
		<td class="GridLine'.$i.'">'.SelectFecha($row["FC"]).'</td>
		<td class="GridLine'.$i.'">'.$row["HC"].'</td>
		<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdCrucesLin"],$row["Estado"],"CrucesLin",$id).'</td>
	</tr>
';
		$i++;
	}
	
	$resultado.='</table>';	
	return $resultado;
}
?>