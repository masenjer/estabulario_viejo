<?php
function CarregaDetallComanda0($id)
{
	$res = '
<p><b>Equips a reservar</b></p>
<p>'.CarregaLlistatEspaisaReservar($id).'</p>
<p>'.CarregaFrangesHoraries($id).'</p>';
	
	return $res;
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
	
	$SQL = "SELECT * from FrangHor WHERE Estat = 1 AND IdComandaCap = ".$id;
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
		
		$resultado .= '
	<tr class="GridLine'.$i.'">
		<td>'.SelectFecha($row["Fecha"]).'</td>
		<td> de les </td>
		<td>'.$row["Desde"].'</td>
		<td> a les </td>
		<td>'.$row["Hasta"].'</td>
	</tr>
		';
		
		if ($row["Estat"] == "2")
		$resultado .= '
	<tr>
		<td colspan="5">'.$row["Deniega"].'</td>
	</tr>		
		';

		$i++;
	}

$resultado .= '</table>';

return $resultado;
}
?>
