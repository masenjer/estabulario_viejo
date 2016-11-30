<?php
function CarregaDetallComanda15($id)
{
	echo 
'<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr valign="top">
		<td>'.MostraDadesPersonalsAE($id).'</td>
		<td>'.MostraAreas($id).'</td>
		<td>'.ContactoOtrosAnimales($id).'</td>
	</tr>
	<tr>
		<td height="10px"></td>
	</tr>
	<tr>
		<td colspan="3">'.CarregaMotiuAccesSE($id).'</td>
	</tr>	
	<tr>
		<td height="10px"></td>
	</tr>
	<tr>
		<td></td>
	</tr>	
 </table>	
	';
}
?>