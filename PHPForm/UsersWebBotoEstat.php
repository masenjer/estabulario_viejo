<?php
function MostraBotonsEstatUsersWeb($id,$Estat)
{
	$valor = '
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
	';
	
	$value = array("Pendent","Denegat","Validat");
	
	for ($i=0;$i<3;$i++)
	{
		if ($i == $Estat)$Sel = "Sel".$Estat;
		else $Sel = "";

		$valor .= '<td><input type="button" id="ButtonEstatUsersWeb'.$i.'" class="ButtonUsersWebEstat'.$Sel.'" onclick="ModificaEstatUsersWeb('.$id.','.$i.');" value="'.$value[$i].'"></td>';	
	}
		
	$valor .= '</tr></table>';
	
	return $valor;
}
?>