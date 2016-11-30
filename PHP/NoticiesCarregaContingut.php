<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 
include("Fechas.php");

session_start();

$resultado = '
<table  cellpadding="0" cellspacing="2" border="0">
	<tr valign="top">
		
	';
	if ($_SESSION["Noticias"]=="1")
	{	
		$resultado = $resultado.'<td align="right" height="25px"><img src="img/ButtonEditContingut.png" style="cursor:pointer;" onClick="AbreGestorNoticias();"></td>';
	}
	$resultado = $resultado.'</tr>
	
</table>
<table  cellpadding="0" cellspacing="3" border="0">';

$today = trim(date("Y-m-d"));

$SQL = "SELECT * FROM Noticias WHERE FechaPub <= '$today' and FechaDesPub > '$today' ORDER BY IdNoticia DESC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
//	if (CompruebaSiPublicado($row["FechaPub"],$row["FechaDesPub"]) == 1)
//	{
	if ($row["Image"]!="")
	{
		$image = '<td width="96px"><img src= "ImgNot/'.$row["Image"].'" style="width:96px;height:96px"></td>
			<td width="5px">
			<td>';
	}else
	{
		$image = '<td colspan="3">';	
	}
		$resultado = $resultado . '
		<tr valign="top"> 
		    '.$image.'
				<table  height="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td class="LinNoticia"><b>'.Quita($row["Titol"]).'</b></td>
					</tr>
					<tr>
						<td class="LinNoticia"><em>['.SelectFecha($row["FechaNot"]).']</em></td>
					</tr>
					<tr>
						<td class="LinNoticia">'.Quita($row["Cos"]).'</td>
					</tr>
					
					
				</table>
			</td>
		</tr>
		';	
//	}
}

mysql_close($oConn);

$resultado = $resultado . '</table>';

echo $resultado;
?>

<?php
function CompruebaSiPublicado($P,$D)
{
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	
	$dp = substr($P,0,2);
	$dd = substr($D,0,2);
	
	$mp = substr($P,3,2);
	$md = substr($D,3,2);
	
	$ap = substr($P,6,4);
	$ad = substr($D,6,4);
	
	if(($ano >= $ap )&&($ano <= $ad))
	{
		if(($mes >= $mp )&&($mes <= $md))
		{
			if(($dia >= $dp )&&($dia <= $dd))
			{
				return 1;
			}
		}
	}
	
	return 0;
}
?>