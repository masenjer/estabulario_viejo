<?php
function CarregaFrangHor($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM FrangHor
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = ' 	
	<table cellpadding="2" cellspacing="0" border="0" style="border:1px solid #9e9885">
		<tr class="CapcaGrid" align="left" style="text-align:left;">
			<td>Dies pels que es sol&middot;licita l\'acc&eacute;s</td>
		</tr>';
	
	if ( mysql_num_rows($result) > 0)		
	{
		$i=0;		
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			$resultado .= '
			<tr>
				<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]). " des de les " .$row["Desde"]."h fins les " .$row["Desde"]."h</td>
			</tr>";
			$i++;
		}
	}

	return $resultado.'</table>';
}
?>