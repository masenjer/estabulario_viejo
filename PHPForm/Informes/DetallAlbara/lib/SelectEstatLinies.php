<?php
function CarregaSelectEstat($id,$num,$taula,$idCC)
{
	
	$color = array("#ffd789","#adff89","#ff8989");
	
	$cadena = array("En tramit","S'accepta", "Es denega");
	$resultado = '<select id="Estat'.$taula.$id.'" class="fuenteForm" style="background-color:'.$color[$num].'" disabled="disabled">';
	for ($i=0;$i<3;$i++)
	{
		
		if ($i	== $num) $select = ' selected="selected" ';
		else $select = "";
		
		if ((($i==0)&&($num == 0))||($i!=0))
		$resultado .= '<option value="'.$i.'" '.$select.' style="background-color:'.$color[$i].'">'.$cadena[$i].'</option>';
	}
	return $resultado .'</select>';
}


?>