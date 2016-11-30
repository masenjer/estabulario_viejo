<?php

function MostraDadesPersonalsAE($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM AccesEstabulari  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '
	<table width="700px" >
		<tr>
			<td class="titolForm" colspan="4">Dades Personals</td>
		</tr>';
		
		$var = array ("Personal per a atendre als animals","Personal experimentador","Personal investigador","No estic acreditat/da, especificar motius: ____________________________<br>_____________________________________________________________");
	
	while ($row = mysql_fetch_array($result))
	{
		$resultado .= '
		<tr>
			<td class="fuenteForm"><b>Nom i Cognoms: </td>
			<td colspan="3" class="fuenteForm">'.convert_accents($row["Nom"]).'</b></td>
		</tr>
		<tr>
			<td class="fuenteForm"><b>DNI:</b></td>
			<td class="fuenteForm">'.$row["NIF"].'</td>
			<td class="fuenteForm"><b>Tel&egrave;fon:</b></td>
			<td class="fuenteForm">'.$row["Tel"].'</td>
		</tr>
		<tr>
			<td class="fuenteForm"><b>Email:</b></td>
			<td class="fuenteForm">'.$row["Email"].'</td>
			<td class="fuenteForm"><b>Centre:</b></td>
			<td class="fuenteForm">'.$row["Centro"].'</td>
		</tr>
		<tr>
			<td class="fuenteForm" height="5px"></td>
		</tr>
		<tr>
			<td class="fuenteForm" colspan="4"><b>Tipus d\'acreditaci&oacute; que poseeix:</b></td>
		</tr>';
		
		$cadena = explode ("|",$row["Acreditacion"]);
		
		for ($i=0;$i<4;$i++)
		{
			if ($cadena[$i] == "1")
			{
				$resultado.='
		<tr>
			<td></td>
			<td class="fuenteForm" colspan="3">'.$var[$i].'</td>
		</tr>';
			}	
		}

	}
$resultado .= '
	</table>';	
	
	return $resultado;
	
}
function MostraDadesGrupRecercaAE($id)
{
	
	$resultado = '
	<table cellpadding="2" cellspacing="0" border="0">
		<tr>
			<td class="titolForm" colspan="10">Dades del grup de recerca</td>
		</tr>
		<tr>
			<td class="fuenteForm" style="width:150pt"><b>Investigador principal:</b></td>
			<td colspan="10"><div id="EspaiTextDadesGrupRecerca">&nbsp;</div></td>
		</tr>
		<tr>
			<td class="fuenteForm"><b>Unitat:</b></td>
			<td colspan="10"><div id="EspaiTextDadesGrupRecerca">&nbsp;</div></td>
		</tr>
		<tr>
			<td class="fuenteForm"><b>Departament:</b></td>
			<td colspan="10"><div id="EspaiTextDadesGrupRecerca">&nbsp;</div></td>
		</tr>
		<tr>
			<td class="fuenteForm"><b>Adre&ccedil;a electr&ograve;nica:</b></td>
			<td><div id="EspaiEmailDadesGrupRecerca">&nbsp;</div></td>
			<td style="width:20pt" class="fuenteForm"><b>Tel&egrave;fon:</b></td>
			<td style="text-align:left;"><div id="EspaiTelefonDadesGrupRecerca">&nbsp;</div></td>
		</tr>
		<tr>
			<td class="fuenteForm"><b>Facultat/centre:</b></td>
			<td colspan="10"><div id="EspaiTextDadesGrupRecerca">&nbsp;</div></td>
		</tr>

';
		

$resultado .= '
	</table>';	
	
	return $resultado;
	
}

function MostraAreas($id)
{
	include("../../rao/EstabulariForm_con.php");

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
	<table width="500pt" cellpadding="2" cellspacing="0" border="0" >
		<tr>
			<td class="titolForm" colspan="8"><b>&Agrave;rees a les que es vol tenir acc&eacute;s</b></td>
		</tr>';
	$aux = 0;
	
	$i=0;
	foreach ($cadena as $value) 
	{
		$aux %= 8;
		$i%=2;
		if ($aux == 0) 	$resultado .= '<tr>';
    	$resultado .= '<td class="fuenteForm" width="60px" align="center" class="GridLine'.$i.'">'.$var[$value].'</td>';
		if ($aux == 8) 	$resultado .= '<tr>';
		
		$aux ++;
		$i++;
	}
	
	if ($otrasZ)
	{
		$resultado .= '
		<tr>
			<td height=10px></td>
		</tr>
		<tr>
			<td colspan="8" class="fuenteForm"> <b>Altres zones:</b>'.convert_accents($otrasZ).'</td>	
		</tr>
	</table>';
	}
	else $resultado .= '</table>';
	
	return $resultado;
}


function ContactoOtrosAnimales($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT *
			FROM ContactoOtrosAnimales  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$tipo = array("Mascotes","Animals d' experimentaci&oacute;","Animals salvatges","Altres posibles situacions de risc");
	
	$resultado = 
	'<table width="800px">
		<tr>
			<td class="titolForm" colspan="4"><b>Contacte amb altres animals</b></td>
		</tr>';	
	
	$count=0;
	while ($row = mysql_fetch_array($result))
	{
		if ($row["Fecha"])
		{
			$fecha = '<td class="fuenteForm">'.SelectFecha($row["Fecha"]).'</td>';
			$colsp = "";
		}
		else 
		{
			$fecha = "";
			$colsp = ' colspan = "2"  ';
		}
		$resultado .= '
		<tr>
			<td colspan="2" class="fuenteForm" style="width:180px"><b>'.$tipo[$row["Tipus"]].': </b></td>
			'.$fecha.'
			<td '.$colsp.' class="fuenteForm" style="width:350px">'.convert_accents($row["Especies"]).'</td>
		</tr>
		';
		$count ++;	
	}
	
	if ($count == 0)
	$resultado .= '
		<tr>
			<td colspan="2" class="fuenteForm">No</td>
		</tr>
		';	 

	
	$resultado .= 
	'</table>';
	
	return $resultado;
}

function CarregaMotiuAccesSE($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT Motivo
			FROM AccesEstabulari  
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		return '
			<table>
				<tr>
					<td class="titolForm">Motiu:</td>
					<td class="fuenteForm">'.convert_accents($row["Motivo"]).'</td>
				</tr>
			</table>
		';
		$data = $row["Areas"];
	}
}

function CarregaCompromis()
{
	return '
		<table width="760px">
			<tr>
				<td class="titolForm">Comprom&iacute;s d\'actualitzaci&oacute; de les dades que consten en aquest document</td>
			</tr>
			<tr>
				<td class="fuenteForm"><img src="DetallAutoEntrada/img/checkbox.png" />&nbsp; Em comprometo a comunicar immediatament i per escrit a la direcci&oacute; o al servei veterinari del Servei d\'Estabulari qualsevol modificaci&oacute; en les dades que consten en aquest document.
				</td>
			</tr>
			<tr>
				<td class="titolForm">Acci&oacute; formativa</td>
			</tr>
			<tr>
	<td class="fuenteForm"><img src="DetallAutoEntrada/img/checkbox.png" />&nbsp; He rebut l\'acci&oacute; formativa al Servei d\'Estabulari, el dia __________per_____________________________
				</td>
			</tr>
			<tr>
				<td height="20px"></td>
			</tr>
			<tr>
				<td class="fuenteForm">
					Signatura: _____________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data: __________________________________
				</td>			
			</tr>
			
		</table>
	';
}

?>