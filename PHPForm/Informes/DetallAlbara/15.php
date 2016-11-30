<?php
function CarregaDetallComanda15($id)
{
	return 
'<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr valign="top">
		<td>'.MostraDadesPersonalsAE($id).'</td>
		<td>'.MostraAreas($id).'</td>
		<td>'.ContactoOtrosAnimales($id).'</td>
	</tr>
	
 </table>	
	<p>
		'.CarregaMotiuAccesSE($id).'
	</p>	
	';
}
?>