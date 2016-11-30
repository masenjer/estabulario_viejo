<?php
function InfoData00($fecha)
{
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	
	$SQL1 = "SELECT E.NomEquip, R.IdComandaCap, FH.Desde, FH.Hasta
			FROM ReservaEspai R 
				INNER JOIN 		FrangHor FH
				ON				R.IdComandaCap = FH.IdComandaCap
				INNER JOIN 		Equips E
				ON				R.Equips = E.IdEquip
			WHERE 	FH.Fecha = '".$fecha."'
			AND 	FH.Estat = 1
			ORDER BY FH.Desde ASC
	 ";
	 
	// echo $SQL1;
	
	$result1 = mysql_query($SQL1,$oConn);
	
	$text1 = '
<p>Reserva d\' espais i equips al SE</p>


<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
			<td class="CapcaGrid"><b>Desde</b></td>
			<td class="CapcaGrid"><b>Hasta</b></td>
			<td class="CapcaGrid"><b>Comanda</b></td>
			<td class="CapcaGrid"><b>Equip</b></td>
		</tr>
	';

	$i = 0;
	
	while ($row = mysql_fetch_array($result1))
	{
		$i%=2;

		$text1 .= '	
		<tr>
			<td class="GridLine'.$i.'">'.$row["Desde"].'</td>
			<td class="GridLine'.$i.'">'.$row["Hasta"].'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEquip"].'</td>
		</tr>
	';
		$i++;
		$buit ++;
	}
	$text1 .= "
	</table>
	";
	
	if ($buit > 0)return $text1;
}
?>
