<?php
function InfoData14($fecha)
{
	
	include("../../rao/EstabulariForm_con.php");
	
	$buit = 0;
	
	$SQL1 = "SELECT AE.Nom, AE.Cognoms, AE.IdComandaCap, FH.Desde, FH.Hasta 
			FROM UsuariFH AE 
				INNER JOIN 		FrangHor FH
				ON				AE.IdComandaCap = FH.IdComandaCap
			WHERE 	FH.Fecha = '".$fecha."'
			ORDER BY FH.Desde ASC
	 ";
	 
	// echo $SQL1;
	
	$result1 = mysql_query($SQL1,$oConn);
	
	$text1 = '
<p>Acc&eacute;s puntual al Servei Estabulari</p>


<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
			<td class="CapcaGrid"><b>Desde</b></td>
			<td class="CapcaGrid"><b>Hasta</b></td>
			<td class="CapcaGrid"><b>Comanda</b></td>
			<td class="CapcaGrid"><b>Nom i Cognoms</b></td>
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
			<td class="GridLine'.$i.'">'.$row["Nom"].' '.$row["Cognoms"].'</td>
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