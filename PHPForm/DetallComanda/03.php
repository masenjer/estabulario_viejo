<?php
function CarregaDetallComanda3($id)
{
	echo '
<div align="right" style="width:100%"><input type="button" class="ButtonAdd24" onclick="MostraFitxaNewPetCompraAnim('.$id.');"></div>
<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">
	<tr class="CapcaGrid" align="left" style="text-align:left;">
		<td><b>Esp&egrave;cie</b></td>
		<td><b>Soca</b></td>
		<td><b>Prove&iuml;dor</b></td>
		<td><b>Mascles</b></td>
		<td><b>Edat/Pes M</b></td>
		<td><b>Femelles</b></td>
		<td><b>Edat/Pes F</b></td>
		<td><b>Estat</b></td>
	</tr>
		'.CarregaPetCompraAnim($id).'
</table>
<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom:20px;">'.CarregaRecollida($id,"0").'</td>
	</tr>
	<tr>
		<td style="padding-bottom:20px;">'.CarregaArribadaProveidor($id).'</td>
	</tr>
	<tr>
		<td>'.MostraCaixes($id).'</td>
	</tr>
</table>';	
}

function CarregaPetCompraAnim($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.IdProv, PP.CantidadM, PP.EM, PP.EUM, PP.CantidadF, PP.EF, PP.EUF, PP.IdCompraAnim, PP.Estado, P.NomProveidor 
			FROM CompraAnim PP, Especie E, Soca S, Proveidor P 
			WHERE E.IdEspecie = S.IdEspecie 
			AND S.IdSoca = PP.IdSoca 
			AND P.IdProveidor = IdProv 
			AND PP.IdComandaCap = ".$id; 
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
		<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
		<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
		<td class="GridLine'.$i.'">'.$row["NomProveidor"].'</td>
		<td class="GridLine'.$i.'">'.$row["CantidadM"].'</td>
		<td class="GridLine'.$i.'">'.$row["EM"].' '.$EUM.'</td>
		<td class="GridLine'.$i.'">'.$row["CantidadF"].'</td>
		<td class="GridLine'.$i.'">'.$row["EF"].' '.$EUF.'</td>
		<td class="GridLine'.$i.'">'. CarregaSelectEstat($row["IdCompraAnim"],$row["Estado"],"CompraAnim",$id).'</td>
	</tr>
';
	$i++;
	}
	
	return $resultado;
}
?>