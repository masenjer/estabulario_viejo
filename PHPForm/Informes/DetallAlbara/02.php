<?php
function CarregaDetallComanda2($id)
{
	return '<b>Petici&oacute; de femelles acoblades </b><br><br>
<div style="border:1px solid #9e9885">
<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">	<tr style="background-color:#444; color:#FFF" align="left">
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Unitats</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Espècie</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Soca</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Data d\'encreuament</b></td>
	</tr>
		'.CarregaPetHemAc($id).'
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

function CarregaPetHemAc($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.Fecha, PP.Estado, PP.IdPetHemAc
			FROM PetHemAc PP, Especie E, Soca S 
			WHERE PP.Estado = 1 AND E.IdEspecie = S.IdEspecie AND S.IdSoca = PP.IdSoca AND PP.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	
	$i=0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
	<tr>
		<td>'.$row["Cantidad"].'</td>
		<td>'.$row["NomEspecie_ca"].'</td>
		<td>'.$row["NomSoca"].'</td>
		<td>'.SelectFecha($row["Fecha"]).'</td>
	</tr>
';
	$i++;
	}
	return $resultado;
}
?>