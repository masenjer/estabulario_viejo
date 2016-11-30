<?php
include("../rao/EstabulariForm_con.php");

$SQL = "SELECT P.IdProcediment, I.Nom, I.Cognoms, P.NumProc, P.Estat, E.NomEspecie_ca 
		FROM Procediment P
		
		INNER JOIN Investigador I 
		ON I.IdInvestigador = P.IdInvestigador
		
		LEFT JOIN Especie E
		ON E.IdEspecie = P.IdEspecie
		
		ORDER BY I.Cognoms, I.Nom, P.NumProc ASC";
$result = mysql_query($SQL,$oConn);

$resultado = '
<input type="hidden" id="LineaGridActiu">
	<table width="625px" cellpadding="0" cellspacing="0" border="0">
		<tr class="CapGrid">
			<td height="27px" width="300px" class="CapcaGrid" align="left">Investigador</td>
			<td height="27px" width="100px" class="CapcaGrid">&nbsp;&nbsp;&nbsp;Procediment</td>
			<td height="27px" width="100px"  class="CapcaGrid" align="left">Animal</td>
			<td height="27px" width="100px"  class="CapcaGrid" align="left">Estat</td>
		</tr>
	</table>$%&·
	<table width="100%" cellpadding="0" cellspacing="0" border="0">';

$i = 0;

while ($row = mysql_fetch_array($result))
{
	switch ($row["Estat"])
	{
		case 0: 	$Estat = "Nou";
					break;	
		case 1: 	$Estat = "Renovat";
					break;	
		case 2: 	$Estat = "Modificat";
					break;	
		case 3: 	$Estat = "Caducat";
					break;	
	}

	$i%=2;
		
	$resultado = $resultado.'
		<tr id="GridProc'.$row["IdProcediment"].'" height="18px" onclick="CarregaFitxaProc('.$row["IdProcediment"].');" style="cursor:pointer;">
			<td width="300px" class="GridLine'.$i.'"> '.$row["Cognoms"].', '.$row["Nom"].'</td>
			<td width="100px" class="GridLine'.$i.'">'.$row["NumProc"].'</td>
			<td width="100px" class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$Estat.'</td>
		</tr>
				
	';
	$i++;
}

$resultado = $resultado.'</table>';

mysql_close($oConn);

//echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id;
echo $resultado;

?>