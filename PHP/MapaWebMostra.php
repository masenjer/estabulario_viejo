<?php
include("../rao/sas_con.php"); 


$SQL = "SELECT IdCapMenu, Titol FROM CapMenu";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%" height="100%" cellpadding="5">
<tr>
	<td colspan="3" height="20px"> </td>
</tr>
';

$auxTRCap = 0;

while ($row = mysql_fetch_array($result))
{
	if ($auxTRCap == 0) $resultado = $resultado . '
	<tr>';

	$resultado = $resultado . '
		<td align="center" valign="top">
			<table width="200px" cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td width="1px" bgcolor="19616f"></td>
					<td width="5px" bgcolor="19616f"></td>
					<td bgcolor="19616f" class="TitolMapaWeb" height="15px" onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].',\'\',\'\')">'.$row["Titol"].'</td>
					<td width="5px" bgcolor="19616f"></td>
					<td width="1px" bgcolor="19616f"></td>
				</tr>';
				
				

			$SQL2 = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$row["IdCapMenu"]." order by orden";
			$result2 = mysql_query($SQL2,$oConn);
			
			while ($row2 = mysql_fetch_array($result2))
			{
				$resultado = $resultado . '
				<tr>
					<td width="1px" bgcolor="19616f"></td>
					<td colspan="3" height="10px"></td>
					<td width="1px" bgcolor="19616f"></td>
				</tr>
				<tr>
					<td width="1px" bgcolor="19616f"></td>
					<td width="5px"></td>
					<td onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].','.$row2["IdLinMenu"].',1)" class="fuenteMapaWeb" >'.$row2["Titol"].'</td>
					<td width="5px"></td>
					<td width="1px" bgcolor="19616f"></td>
				</tr>
				';
			}


	$resultado = $resultado.
	'			<tr>
					<td width="1px" bgcolor="19616f"></td>
					<td colspan="3" height="15px"></td>
					<td width="1px" bgcolor="19616f"></td>
				</tr>
				<tr>
					<td bgcolor="#19616f" colspan="5" height="1px" >
				</tr>
				<tr>
					<td bgcolor="#FFFFFF" colspan="5" id="OmbraInferiorMenus" class="OmbraInferiorMenus">
				</tr>
			</table>
		</td>';
	
	if ($auxTRCap == 3)
	{ 
		$resultado = $resultado . '</tr>';
		$auxTRCap = 0;
	}
	else $auxTRCap ++;

}

$resultado = $resultado.
	'</tr>
</table>';
mysql_close($oConn);
echo $resultado;
?>

