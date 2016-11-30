<?php
function SelectHoraRecollida($hora)
{ 
	$ha = explode(":",$hora);

	$resultado = 
	'<select id="EditaHoraRecollida" class="selectSenseCaixa" disabled="disabled">';
	
	$h = array("06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22");
	$m = array("00","30");
	
	for ($i=0;$i<sizeof($h);$i++)
	{
		for ($j=0;$j<sizeof($m);$j++)
		{	
			if 	(($h[$i]==$ha[0])&&($m[$j] == $ha[1])) $selected = "selected";
			else $selected = "";
			
			$resultado.= 
			'<option value="'.$h[$i].':'.$m[$j].'" '.$selected.'>'.$h[$i].':'.$m[$j].'</option>';
		}
	}

	$resultado .= 
	'</select>';

	return $resultado;
}
?>