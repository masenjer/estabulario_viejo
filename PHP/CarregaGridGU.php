<?php
include("../rao/EstabulariForm_con.php");

$SQL = "SELECT * FROM Tecnics";
$result = mysql_query($SQL,$oConn);

$resultado = '
<input type="hidden" id="LineaGridActiu">
	<table width="800px" cellpadding="0" cellspacing="0" border="0">';

$i = 0;

while ($row = mysql_fetch_array($result))
{

	$i%=2;
	
	$resultado = $resultado.'
		<tr>
			<td id="GridGU'.$row["IdTecnic"].'" colspan="5" height="18px" '.$color.' onclick="CarregaUserGU('.$row["IdTecnic"].');" style="cursor:pointer;">
				<table width="800px" cellspacing="0" cellpadding="0" border="0">
					<tr valign="middle">
						<td width="230px" class="GridLine'.$i.'">'.$row["Nom"].' '.$row["Cognoms"].'</td>
						<td width="75px" class="GridLine'.$i.'" align="center">'.BuscaVerdadero($row["Usuarios"]).'</td>
						<td width="90px" class="GridLine'.$i.'" align="center">'.BuscaVerdadero($row["Stock"]).'</td>
						<td width="120px" class="GridLine'.$i.'" align="center">'.BuscaVerdadero($row["EspeciesiSoques"]).'</td>
						<td width="140px" class="GridLine'.$i.'" align="center">'.BuscaVerdadero($row["Comandes"]).'</td>
						<td width="140px" class="GridLine'.$i.'" align="center">'.BuscaVerdadero($row["InformeDiari"]).'</td>
						<td width="100px" class="GridLine'.$i.'" align="center">'.BuscaVerdadero($row["InformeFacturacio"]).'</td>
					</tr>
				</table>
			</td>
		</tr>
				
	';
	$i++;
	
//	$T = $row["Titol"];
//	$C = $row["Cos"];
//	$F = SelectFecha($row["FechaNot"]);
//	$FP = SelectFecha($row["FechaPub"]);
//	$FD = SelectFecha($row["FechaDesPub"]);
//	
}

$resultado = $resultado.'
	</table>';

mysql_close($oConn);

//echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id;
echo $resultado;

?>

<?php
function BuscaVerdadero($v)
{
	if ($v == "1")
	{
		return '<img src="img/Grid/true.png">';	
	}else
	{
		return "";	
	}	
}
?>