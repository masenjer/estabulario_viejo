<?php
function CarregaDetallComanda10($id)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaDadesCentre($id,'Dest&iacute;').'</td>
		<td>'.CarregaExpoFecha($id).'</td>
	</tr>
		<tr>
		<td colspan="2" valign="top">'.CarregaExpo($id).'</td>
	</tr>
	<tr>
		<td colspan="2">'.MostraCaixes($id).'</td>
	</tr>

</table>
	';
}

function CarregaExpo($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT E.NomEspecie_ca, HC.Genotip, HC.Marcatge, HC.Iden, HC.Sala, HC.Sexo, HC.Cant, HC.FechaNac, S.NomSoca, HC.IdExpo, HC.Estado
			FROM Expo HC, Especie E, Soca S 
			WHERE E.IdEspecie = HC.IdEspecie AND S.IdSoca = HC.Soca AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
				<tr>
					<td colspan="10" align="center" style="background-color:#444; color:#FFF"><b>Animals a Exportar</b></td>
				</tr>
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td>Esp&egrave;cie</td>
					<td>Soca</td>
					<td>Genotip</td>
					<td>Identificatiu</td>
					<td>Sala</td>
					<td>Sexe</td>
					<td>Unitats</td>
					<td>Data Naixement / Arribada</td>
					<td>Estat</td>
				</tr>';
		$i=0;
				
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			
			$sex = ($row["Sexo"]=="0")?"Mascle":"Femella";

			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td class="GridLine'.$i.'">'.$row["Genotip"].'</td>
					<td class="GridLine'.$i.'">'.$row["Iden"].'</td>
					<td class="GridLine'.$i.'">'.$row["Sala"].'</td>
					<td class="GridLine'.$i.'">'.$sex.'</td>
					<td class="GridLine'.$i.'">'.$row["Cant"].'</td>
					<td class="GridLine'.$i.'">'.SelectFecha($row["FechaNac"]).'</td>
					<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdExpo"],$row["Estado"],"Expo",$id).'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	
	return $resultado;
}

?>