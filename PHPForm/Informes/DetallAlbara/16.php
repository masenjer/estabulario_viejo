<?php
function CarregaDetallComanda16($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM EntradaMaterialsPB
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	
	$res= ' 
		<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">	
			<tr style="background-color:#444; color:#FFF" align="left">
				<td style="background-color:#444; color:#FFF; border:none" align="left" colspan="2"><b>Dies pels quals se sol&middot;licita l\'entrada i materials</b></td>
			</tr>';
	
	if ( mysql_num_rows($result) > 0)		
	{	
		$i=0;	
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			
			$res.= '
			<tr>
				<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).':</td>			
				<td class="GridLine'.$i.'" align="left">'.$row["Materials"].'</td>
			</tr>
		
		';
		$i++;
		}
	}

	return $res . '</table>';
	
}
?>