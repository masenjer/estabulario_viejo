<?php
function CarregaDetallComanda9($id)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaDadesCentre($id,'Origen').'</td>
	</tr>
	<tr>
		<td valign="top">'.CarregaImpo($id).'</td>
	</tr>
</table>
	';
}

function CarregaImpo($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT E.NomEspecie_ca, HC.CantM, S.NomSoca, HC.CantF, HC.Estado, HC.IdImpo
			FROM Impo HC, Especie E, Soca S  
			WHERE E.IdEspecie = HC.IdEspecie AND S.IdSoca = HC.Soca AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
				<tr>
					<td colspan="5" align="center" style="background-color:#444; color:#FFF"><b>Animals a Importar</b></td>
				</tr>
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td>Esp&egrave;cie</td>
					<td>Soca</td>
					<td>Unitats Mascle</td>
					<td>Unitats Femelles</td>
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
					<td class="GridLine'.$i.'">'.$row["CantM"].'</td>
					<td class="GridLine'.$i.'">'.$row["CantF"].'</td>
					<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdImpo"],$row["Estado"],"Impo",$id).'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	
	return $resultado;
}

?>