<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];

$SQL = "SELECT P.NumProc, P.IdInvestigador , I.Nom, I.Cognoms
		FROM Procediment P, ProcedimentUser PU, Investigador I
		WHERE PU.IdUser = ".$id."
		AND P.IdProcediment = PU.IdProcediment
		AND I.IdInvestigador = P.IdInvestigador 
		ORDER BY P.Investigador  ASC
";
$result = mysql_query($SQL,$oConn);

$resultado = '
	<table width="400px" cellpadding="0" cellspacing="0" border="0" >
		<tr class="CapGrid">
			<td width="200px" class="CapcaGrid" >Número de procediment</td>
			<td class="CapcaGrid">Investigador</td>
		</tr>';


while ($row = mysql_fetch_array($result))
{
	$resultado = $resultado.'
		<tr>
			<td align="right" style=" padding:5px;">'.$row["NumProc"].'</td>
			<td style=" padding:5px;">'.$row["Nom"].' '.$row["Cognoms"].'</td>
		</tr>
				
	';
}

$resultado = $resultado.'</table>';

mysql_close($oConn);

//echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id;
echo $resultado;

?>