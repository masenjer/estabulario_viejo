<?php
function CarregaDetallComanda11($id)
{
	return '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaProcedencia($id).'</td>
		<td valign="top">'.CarregaEspaiAnimals($id).'</td>
	</tr>
</table>
	';
}

function CarregaEspaiAnimals($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca, EA.Sexo, EA.Cant, EA.EP, EA.UEP, EA.AJ, EA.Estado, EA.IdEspaiAnimals
			FROM EspaiAnimals EA, Especie E, Soca S 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = EA.IdSoca AND  EA.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
				<tr>
					<td colspan="6" align="center" style="background-color:#444; color:#FFF"><b>Dades dels animals que arribaran</b></td>
					<td align="right" style="background-color:#444"></td>
				</tr>
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td>Esp&egrave;cie</td>
					<td>Soca</td>
					<td>Sexe</td>
					<td>N&deg; animals</td>
					<td>Edat/Pes</td>
					<td>Anim/Gabia</td>
					<td>Estat</td>
				</tr>';
		
		$i=0;
				
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			$EUP = SelectSetGramsDies($row["EUP"]);

			if ($row["Sexo"] == "0") $Sexo = "Mascles";
			else $Sexo = "Femelles";
	
			
			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td class="GridLine'.$i.'">'.$Sexo.'</td>
					<td class="GridLine'.$i.'">'.$row["Cant"].'</td>
					<td class="GridLine'.$i.'">'.$row["EP"].' '.$EUP.'</td>
					<td class="GridLine'.$i.'">'.$row["AJ"].'</td>
					<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdEspaiAnimals"],$row["Estado"],"EspaiAnimals",$id).'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	
	return $resultado;
}

?>