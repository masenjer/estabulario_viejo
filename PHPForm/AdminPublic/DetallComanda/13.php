<?php
function CarregaDetallComanda13($id)
{

	echo 
'<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr valign="top">
		<td>'.MostraDadesPersonalsAE($id).'</td>
		<td>'.MostraAreas($id).'</td>
		<td>'.ContactoOtrosAnimales($id).'</td>
	</tr>
	<tr>
		<td height="10px"></td>
	</tr>
	<tr>
		<td colspan="3">'.CarregaMotiuAccesSE($id).'</td>
	</tr>	
	<tr>
		<td height="10px"></td>
	</tr>
	<tr>
		<td></td>
	</tr>	
	<tr>
		<td colspan="3">'.CarregaFrangHor($id).'</td>
	</tr>		
 </table>	
	';
}
	


function MostraDadesPersonalsAE($id)
{
	include("../../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM AccesEstabulari  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '
	<table cellpadding="2" cellspacing="0" border="0" style="border:1px solid #9e9885">
		<tr class="CapcaGrid" align="left" style="text-align:left;">
			<td>Dades Personals</td>
		</tr>';
		
		$var = array ("Personal per a atendre als animals","Personal experimentador","Personal investigador","No estic acreditat/da");
	
	while ($row = mysql_fetch_array($result))
	{
		$resultado .= '
		<tr>
			<td class="GridLine0">'.$row["Nom"].'</td>
		</tr>
		<tr>
			<td class="GridLine1">'.$row["NIF"].'</td>
		</tr>
		<tr>
			<td class="GridLine0">'.$row["Tel"].'</td>
		</tr>
		<tr>
			<td class="GridLine1">'.$row["Email"].'</td>
		</tr>
		<tr>
			<td class="GridLine0">'.$row["Centro"].'</td>
		</tr>
		<tr>
			<td height="5px"></td>
		</tr>
		<tr>
			<td style="background-color:#eee;"><b>Acreditacions</b></td>
		</tr>';
		
		$cadena = explode ("|",$row["Acreditacion"]);
		
		for ($i=0;$i<4;$i++)
		{
			if ($cadena[$i] == "1")
			{
				$resultado.='
		<tr>
			<td style="background-color:#eee;">'.$var[$i].'</td>
		</tr>';
			}	
		}

	}
$resultado .= '
	</table>';	
	
	return $resultado;
	
}

function MostraAreas($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT Areas, OtrasZonas
			FROM AccesEstabulari  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$data = $row["Areas"];
		$otrasZ = $row["OtrasZonas"];
	}
	

	$cadena = explode ("|",$data);
	
	$var= array("A1","B1","H1","F1","F5","A2","B2","H2","F2","F6","A3","B3","H3","F3","F7","A4","B4","H4","F4","F8");
	
	$resultado = '
	<table cellpadding="2" cellspacing="0" border="0" width="248px" style="border:1px solid #9e9885">
		<tr class="CapcaGrid" align="left" style="text-align:left;">
			<td colspan="4"><b>&Agrave;rees a les que es vol tenir acc&eacute;s</b></td>
		</tr>';
	$aux = 0;
	
	$i=0;
	foreach ($cadena as $value) 
	{
		if ($value == "Nolose") $valor = "No ho se";
		else $valor = $var[$value];
		$aux %= 4;
		$i%=2;
		if ($aux == 0) 	$resultado .= '<tr>';
    	$resultado .= '<td width="60px" align="center" class="GridLine'.$i.'">'.$valor.'</td>';
		if ($aux == 4) 	$resultado .= '<tr>';
		
		$aux ++;
		$i++;
	}
	
	if ($otrasZ)
	{
		$resultado .= '
		<tr><td height=10px></td></tr>
		<tr>
			<td colspan="4" style="background-color:#eee;"> <b>Altres zones</b></td>
		<tr>
		<tr>
			<td colspan="4" style="background-color:#eee;">'.$otrasZ.'</td>	
		</tr>
	</table>';
	}
	else $resultado .= '</table>';
	
	return $resultado;
}


function ContactoOtrosAnimales($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT *
			FROM ContactoOtrosAnimales  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$tipo = array("Mascotes","Animals d' experimentació","Animals salvatges","Altres posibles situacions de risc");
	
	$resultado = 
	'<table cellpadding="2px" cellspacing="0" border="0" style="border:1px solid #9e9885">
		<tr class="CapcaGrid" align="left" style="text-align:left;">
			<td colspan="4"><b>Contacte amb altres animals</b></td>
		</tr>';	
	
	$count = 0;
	$i=0;
	while ($row = mysql_fetch_array($result))
	{
		
		$i%=2;
		
		if($row["Tipus"] != "3")
		{
		$resultado .= '
		<tr>
			<td colspan="2" class="GridLine'.$i.'">'.$tipo[$row["Tipus"]].'</td>
			<td style="padding-left:10px;" class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			<td style="padding-left:10px;" class="GridLine'.$i.'">'.$row["Especies"].'</td>
		</tr>
		';
		}
		else
		{
		$resultado .= '
		<tr>
			<td colspan="2" class="GridLine'.$i.'">'.$tipo[$row["Tipus"]].'</td>
			<td colspan="2" style="padding-left:10px;" class="GridLine'.$i.'">'.$row["Especies"].'</td>
		</tr>
		';
		}
		$i++;
		$count ++;	
	}
	
	if ($count == 0)
	$resultado .= '
		<tr>
			<td colspan="2" class="GridLine'.$i.'">No</td>
		</tr>
		';	 
	 
	
	$resultado .= 
	'</table>';
	
	return $resultado;
}

function CarregaMotiuAccesSE($id)
{
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "SELECT Motivo
			FROM AccesEstabulari  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		return '
			<table>
				<tr>
					<td><b>Motiu:</b></td>
					<td>'.$row["Motivo"].'</td>
				</tr>
			</table>
		';
		$data = $row["Areas"];
	}
}

?>