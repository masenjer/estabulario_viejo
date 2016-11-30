<?php
function CarregaDetallComanda16($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM EntradaMaterialsPB
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	
	echo ' 
		<table cellpadding="2" cellspacing="0" border="0" style="border:1px solid #9e9885">
			<tr class="CapcaGrid" align="left" style="text-align:left;">
				<td colspan="2"><b>Dies pels quals se sol&middot;licita l\'entrada i materials</b></td>
				<td><b>Estat</b></td>
			</tr>';
	
	if ( mysql_num_rows($result) > 0)		
	{	
		$i=0;	
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			
			echo '
			<tr>
				<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).':</td>			
				<td class="GridLine'.$i.'" align="left">'.$row["Materials"].'</td>
				<td class="GridLine'.$i.'">'. CarregaSelectEstat($row["IdEntradaMaterialsPB"],$row["Estado"],"EntradaMaterialsPB",$id).'</td>
			</tr>
		
		';
		$i++;
		}
	}

	echo '</table>';
	
}
?>