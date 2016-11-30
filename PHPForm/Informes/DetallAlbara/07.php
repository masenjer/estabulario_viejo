<?php
function CarregaDetallComanda7($id)
{
	return '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaCrucesF($id).'</td>
		<td valign="top">'.CarregaCrucesM($id).'</td>
		<td valign="top">'.CarregaCrucesC($id).'</td>
	</tr>
</table>
	<p>
		'.CarregaCrucesLin($id).'
	</p>
	<p>
		'.CarregaRecollida($id,"1").'
	</p>	
	<p>
		<'.MostraCaixes($id).'
	</p>
	';
}

function CarregaCrucesF($id)
{
	include("../../rao/EstabulariForm_con.php");
	
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
			<tr class="GridLine0">
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
	include("../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.EM, HC.EUM, HC.CM, HC.V
			FROM CrucesCap HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSocaM AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
//	echo $SQL;

	$resultado = '<table cellpadding="5" cellspacing="0" border="0" style="border:1px solid #9e9885">';
	
	while ($row = mysql_fetch_array($result))
	{
		$EUM = SelectSetGramsDies($row["EUM"]);

		if ($row["V"] == "0") $V = "Vasectomitzats";
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
			<tr class="GridLine0">
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
	include("../../rao/EstabulariForm_con.php");
	
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
	include("../../rao/EstabulariForm_con.php");
		
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
			WHERE IdCrucesCap = ".$IdCC."
			AND Estado = 1"; 

	$result = mysql_query($SQL,$oConn);
	
	$resultado = '
		<div style="border:1px solid #9e9885">
			<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">	
				<tr style="background-color:#444; color:#FFF" align="left">
					<td colspan="6" style="background-color:#444; color:#FFF; border:none" align="left"><b>Encreuaments</b></td>
				</tr>
				<tr style="background-color:#444; color:#FFF" align="left">
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Id Mascle</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Id Femella 1</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Id Femella 2</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Id Femella 3</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Data</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Hora</b></td>';
						
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
	</tr>
';
		$i++;
	}
	
	$resultado.='</table></div>';	
	return $resultado;
}
?>