<?php
function MostraBotonsEstatComanda($id,$Estat)
{
	echo'
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
	';
	
	$value = array("Pendent","En Curs","Finalitzat");
	
	for ($i=0;$i<3;$i++)
	{
		if ($i == $Estat)$Sel = "Sel".$Estat;
		else $Sel = "";

		echo '<td><input type="button" id="ButtonEstatComanda'.$i.'" class="ButtonComandesEstat'.$Sel.'" value="'.$value[$i].'"></td>';	
	
	}
		
	echo '	</tr>
	</table>';
}
?>