<?php
function InfoData12($fecha)
{
include("../../rao/EstabulariForm_con.php");

$buit = 0;

$resultado = '
<p>Av&iacute;s d\'arribada de paqueteria</p>


<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Proveidor</b></td>
		<td class="CapcaGrid"><b>Concepte</b></td>
		<td class="CapcaGrid"><b>Identificaci&oacute;</b></td>
		<td class="CapcaGrid"><b>Consevaci&oacute;</b></td>
	</tr>
';

	$SQL = "SELECT *
			FROM Paqueteria  
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
		
		switch ($row["Condicions"])
		{
			case 0: $cond = "Temperatura ambient";
					break;	
			case 1: $cond = "Refrigeraci&oacute;: 5ºC";
					break;	
			case 2: $cond = "Congelaci&oacute;: -20ºC";
					break;	
			case 3: $cond = "Congelaci&oacute;: -80ºC";
					break;	
		}

		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["Proveidor"].'</td>
			<td class="GridLine'.$i.'">'.$row["Concepte"].'</td>
			<td class="GridLine'.$i.'">'.$row["Identificacio"].'</td>
			<td class="GridLine'.$i.'">'.$cond.'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}
?>