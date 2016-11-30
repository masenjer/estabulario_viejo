<?php
function CarregaDetallComanda12($id)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td valign="top">'.CarregaPaqueteria($id).'</td>
	</tr>
</table>
	';
}

function CarregaPaqueteria($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT *
			FROM Paqueteria  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	if ( mysql_num_rows($result) > 0)		
	{	

		$resultado = '<table cellpadding="5" border="0" cellspacing="0" style="border:1px solid #9e9885">
				<tr>
					<td colspan="6" align="left" style="background-color:#444; color:#FFF"><b>Dades de la paqueteria que han de portar</b></td>
				</tr>
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td>Prove&iuml;dor</td>
					<td>Concepte</td>
					<td width="120px">Data d\'arribada</td>
					<td>Identificaci&oacute;</td>
					<td>Conservaci&oacute;</td>
					<td>Estat</td>
				</tr>';
		
		$i=0;
				
		while ($row = mysql_fetch_array($result))
		{
			switch ($row["Condicions"])
			{
				case 0: $cond = "Temperatura ambient";
						break;	
				case 1: $cond = "Refrigeraci&oacute;: 5ºC";
						break;	
				case 2: $cond = "Congelaci&oacute;: -20ºC";
						break;	
				case 3: $cond = "Congelaci&oacute;: -80ºC";
						break;	
			}
			$i%=2;
			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["Proveidor"].'</td>
					<td class="GridLine'.$i.'">'.$row["Concepte"].'</td>
					<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
					<td class="GridLine'.$i.'">'.$row["Identificacio"].'</td>
					<td class="GridLine'.$i.'">'.$cond.'</td>
					<td class="GridLine'.$i.'">'.CarregaSelectEstat($row["IdPaqueteria"],$row["Estado"],"Paqueteria",$id).'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	return $resultado;
}

?>