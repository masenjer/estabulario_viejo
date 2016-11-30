<?php
function CarregaDetallComanda8($id)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaAnimalsComanda8($id).'</td>
		<td valign="top">'.CarregaJaulasComanda8($id).'</td>		
	</tr>
	<tr>
		<td colspan="2">'.CarregaRecollida($id,"8").'</td>
	</tr>
	<tr>
		<td colspan="2">'.CarregaDevolucio($id,"8").'</td>
	</tr>
</table>
	';
}

function CarregaAnimalsComanda8($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.RatonID, HC.Cantidad, HC.Estado, HC.IdJaulasAnimLin
			FROM JaulasAnimLin HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSoca AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
				<tr>
					<td colspan="4" style="background-color:#444; color:#FFF"><b>Animals</b></td>
					<td align="right" style="background-color:#444; color:#FFF"></td>
				</tr>
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td>Unitats</td>
					<td>Esp&egrave;cie</td>
					<td>Soca</td>
					<td>RatonID</td>
					<td>Estat</td>
				</tr>';
		
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td class="GridLine'.$i.'">'.$row["RatonID"].'</td>
					<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdJaulasAnimLin"],$row["Estado"],"JaulasAnimLin",$id).'</td>
				</tr>
			';
			
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	
	return $resultado;
}

function CarregaJaulasComanda8($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.Sala, HC.Posicion, HC.NumJaula, HC.Estado, HC.IdJaulasJaulaLin
			FROM JaulasJaulaLin HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSoca AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
				<tr>
					<td colspan="5" style="background-color:#444; color:#FFF"><b>G&agrave;bies</b></td>
					<td align="right" style="background-color:#444; color:#FFF"></td>
				</tr>
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td>Esp&egrave;cie</td>
					<td>Soca</td>
					<td>Sala</td>
					<td>Posicio</td>
					<td>N&deg; de G&agrave;bia</td>
					<td>Estat</td>
				</tr>';
		
		$i=0;
		
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td class="GridLine'.$i.'">'.$row["Sala"].'</td>
					<td class="GridLine'.$i.'">'.$row["Posicion"].'</td>
					<td class="GridLine'.$i.'">'.$row["NumJaula"].'</td>
					<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdJaulasJaulaLin"],$row["Estado"],"JaulasJaulaLin",$id).'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	
	return $resultado;
}

?>