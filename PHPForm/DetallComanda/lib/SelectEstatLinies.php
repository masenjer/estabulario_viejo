<?php
function CarregaSelectEstat($id,$num,$taula,$idCC)
{
	
	$color = array("#ffd789","#adff89","#ff8989");
	
	$cadena = array("Pendent d'acceptaci&oacute;","S'accepta", "Es denega");
	$resultado = '<select id="Estat'.$taula.$id.'" onchange="GuardaEstatSelectLinies('.$id.',this.value,\''.$taula.'\','.$idCC.');" class="fuenteForm" style="background-color:'.$color[$num].'">';
	for ($i=0;$i<3;$i++)
	{
		 //$accion = 'GuardaEstatSelectLinies('.$id.','.$i.',\''.$taula.'\','.$idCC.')';
		
		if ($i	== $num) $select = ' selected="selected" ';
		else $select = "";
		
		if ((($i==0)&&($num == 0))||($i!=0))
		$resultado .= '<option value="'.$i.'" '.$select.'  style="background-color:'.$color[$i].'">'.$cadena[$i].'</option>';
	}
	return $resultado .'</select>';
}


?>