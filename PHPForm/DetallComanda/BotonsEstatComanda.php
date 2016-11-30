<?php
function MostraBotonsEstatComanda($id,$Estat)
{
	$res = '
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="padding-left:15px;padding-right:15px">Estat de la comanda: </td>
	';
	
	$value = array("Pendent","En Curs","Finalitzat");
	
	for ($i=0;$i<3;$i++)
	{
		if ($i == $Estat)$Sel = "Sel".$Estat;
		else $Sel = "";

		$res .= '<td><input type="button" id="ButtonEstatComanda'.$i.'" class="ButtonComandesEstat'.$Sel.'" onclick="ModificaEstatComanda('.$id.','.$i.');" value="'.$value[$i].'"></td>';	
	
	}
		
	return $res .'	</tr>
	</table>';
}
?>