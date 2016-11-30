<?php
function CarregaDetallComanda3($id)
{
	return '<b>Compra d\'animals </b><br><br>
			<div style="border:1px solid #9e9885">
			<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">	<tr style="background-color:#444; color:#FFF" align="left">
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Espècie</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Soca</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Prove&iuml;dor</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Quant M</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Edat/Pes M</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Quant F</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Edat/Pes F</b></td>
	</tr>
		'.CarregaPetCompraAnim($id).'
</table>
</div><br><br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>'.MostraCaixes($id).'</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>
	<tr>
		<td style="padding-bottom:20px; padding-top:50px">'.CarregaRecollida($id,"0").'</td>
	</tr>
</table>';	
}

function CarregaPetCompraAnim($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.CantidadM, PP.EM, PP.EUM, PP.CantidadF, PP.EF, PP.EUF, PP.IdCompraAnim, PP.Estado, P.NomProveidor 
			FROM CompraAnim PP, Especie E, Soca S, Proveidor P 
			WHERE E.IdEspecie = S.IdEspecie AND PP.IdProv = P.IdProveidor AND Estado =1 AND S.IdSoca = PP.IdSoca AND PP.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';

	$i=0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		$EUM = SelectSetGramsDies($row["EUM"]);
		$EUF = SelectSetGramsDies($row["EUF"]);
		
		$resultado .= '
	<tr>
		<td>'.$row["NomEspecie_ca"].'</td>
		<td>'.$row["NomSoca"].'</td>
		<td>'.$row["NomProveidor"].'</td>
		<td>'.$row["CantidadM"].'</td>
		<td>'.$row["EM"].' '.$EUM.'</td>
		<td>'.$row["CantidadF"].'</td>
		<td>'.$row["EF"].' '.$EUF.'</td>
	</tr>
';
	$i++;
	}
	
	return $resultado;
}
?>