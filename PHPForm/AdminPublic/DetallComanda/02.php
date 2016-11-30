<?php
function CarregaDetallComanda2($id)
{
	echo '</div>
<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">
	<tr class="CapcaGrid" align="left" style="text-align:left;">
		<td><b>Unitats</b></td>
		<td><b>Espècie</b></td>
		<td><b>Soca</b></td>
		<td><b>Data Naixement / Arribada</b></td>
		<td><b>Estat</b></td>
	</tr>
		'.CarregaPetHemAc($id).'
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-top:20px;padding-bottom:20px;">'.CarregaRecollida($id,"0").'</td>
	</tr>
	<tr>
		<td>'.MostraCaixes($id).'</td>
	</tr>
</table>';	

}

function CarregaPetHemAc($id)
{
	include("../../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.Fecha, PP.Estado, PP.IdPetHemAc
			FROM PetHemAc PP, Especie E, Soca S 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = PP.IdSoca AND PP.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '';
	
	$i=0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
	<tr>
		<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
		<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
		<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
		<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
		<td class="GridLine'.$i.'">'. CarregaSelectEstat($row["IdPetHemAc"],$row["Estado"],"PetHemAc",$id).'</td>
	</tr>
';
	$i++;
	}
	return $resultado;
}
?>