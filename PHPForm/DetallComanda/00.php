<?php
function CarregaDetallComanda0($id)
{
	echo '
<table width="850px" cellpadding="5px" cellspacing="0" border="0">
	<tr>
		<td align="left"><b>Equips a reservar</b></td>
	</tr>
	<tr>
		<td valign="top" align="left">'.CarregaLlistatEspaisaReservar($id).'</td>
		<td valign="top" align="right" width="450px">'.CarregaFrangesHoraries($id).'</td>
	</tr>
</table>
	';
}

function CarregaLlistatEspaisaReservar($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT E.NomEquip from ReservaEspai R, Equips E WHERE E.IdEquip = R.Equips AND R.IdComandaCap = ".$id;
	$result = mysql_query($SQL,$oConn);
	while ($row = mysql_fetch_array($result))
	{
		return $row["NomEquip"];
	}
}

function CarregaFrangesHoraries($id)
{
	include("../../rao/EstabulariForm_con.php");
	//include("../../rao/PonQuita.php");
	
	$SQL = "SELECT * from FrangHor WHERE IdComandaCap = ".$id;
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '
<table cellpadding="5" cellspacing="0" border="0" style="border:1px solid #9e9885">	
	<tr class="CapcaGrid">
		<td colspan="6">Franges Hor&agrave;ries</td>
	</tr>
';
	$i=0;	
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		if ($row["Estat"]=="2" ) $display = "";
		else $display = ' style="display:none"';
		
		$resultado .= '
	<tr class="GridLine'.$i.'">
		<td>'.SelectFecha($row["Fecha"]).'</td>
		<td> de les </td>
		<td>'.$row["Desde"].'</td>
		<td> a les </td>
		<td>'.$row["Hasta"].'</td>
		<td>'.CarregaSelectReservaFrangHor($row["IdFrangHor"],$row["Estat"],$id).'</td>
	</tr>
	<tr class="GridLine'.$i.'"'.$display.'>
		<td colspan="6">
			<div id="DIVDenegat'.$row["IdFrangHor"].'" '.$display.'>
				<table>
					<tr>
						<td>Motiu</td>
						<td><textarea id="TADeniegaFrangHor'.$row["IdFrangHor"].'" style="width:250px" class="fuenteForm">'.Quita($row["Deniega"]).'</textarea></td>
						<td><input type="button" class="ButtonSave32" onclick="SaveTADenegaReservaFrangHor('.$row["IdFrangHor"].','.$id.');"></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
		';
		$i++;
	}

$resultado .= '</table>';

return $resultado;
}


function CarregaSelectReservaFrangHor($id,$num,$idCC)
{
	$cadena = array("Pendent d'acceptaci&oacute;","S'accepta", "Es denega"); 
	$color = array("#ffd789","#adff89","#ff8989"); 

	$resultado = '<select id="EstatFrangHor'.$id.'" onchange="GuardaEstatFrangHor('.$id.','.$idCC.')" class="fuenteForm" style="background-color:'.$color[$num].'">'; 

	for ($i=0;$i<3;$i++)
	{
		if ($i	== $num) $select = ' selected="selected" ';
		else $select = "";
		
		$resultado .= '<option value="'.$i.'" '.$select.'  style="background-color:'.$color[$i].'">'.$cadena[$i].'</option>';
	}
	return $resultado .'</select>';
}
?>
