<?php
function InfoData16($fecha)
{
include("../../rao/EstabulariForm_con.php");

$buit = 0;

$resultado = '
<p>Entrada de materials a la planta baixa</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Materials</b></td>
	</tr>
';

	$SQL = "SELECT *
			FROM EntradaMaterialsPB
			WHERE Fecha = '".$fecha."'
			AND Estado = 1
			ORDER BY IdComandaCap
			"; 

//echo $SQL;			
	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.utf8_decode($row["Materials"]).'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}
?>