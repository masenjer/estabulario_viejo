<?php
include("../rao/sas_con.php");
session_start();


if ($_SESSION["Noticias"]=="1")
{	
	$permiso = '<img src="img/ButtonEditContingut.png" style="cursor:pointer; height:20px" onClick= "CarregaContacteEdicio();">';
}


$SQL = "SELECT * FROM Contacte";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0">
	<tr >
		<td style="border:solid; border-width:1px; border-right:none; border-color:#666; " colspan="3" height="25px" background="img/FonsMenuSupButton.jpg" valign=middle" class="TitolHome" align="center">CONTACTA AMB NOSALTRES</td>
		<td style="border:solid; border-width:1px; border-left:none; border-color:#666;" background="img/FonsMenuSupButton.jpg" valign=middle" class="TitolHome" colspan="2" >'.$permiso.'</td>
	</tr>
	<tr>
		<td height="1px" colspan="5" bgcolor="#dbdbdb"></td>
	</tr>';

while ($row = mysql_fetch_array($result))
{
	$accion = ' onClick="CarregaEnllacIntern(\''.$row["URL"].'\');"'; 
	 
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="1px" bgcolor="#dbdbdb"></td>
		<td width="10px"></td>
		<td height="20px" align="justify" class="TitolContacteHome">'.$row["Titol"].'
		</td>
		<td width="10px"></td>
		<td width="1px" bgcolor="#dbdbdb"></td>		
	</tr>
	<tr valign="middle">
		<td width="1px" bgcolor="#dbdbdb"></td>
		<td width="10px"></td>
		<td height="20px" align="justify" class="fuenteContacteHome">'.$row["Contingut"].'
		</td>
		<td width="10px"></td>
		<td width="1px" bgcolor="#dbdbdb"></td>		
	</tr>
	<tr valign="middle">
		<td width="1px" bgcolor="#dbdbdb"></td>
		<td width="10px"></td>
		<td height="20px" align="right" '.$accion.' class="InfoContacteHome"> + informació
		</td>
		<td width="10px"></td>
		<td width="1px" bgcolor="#dbdbdb"></td>		
	</tr>

	<tr>
		<td height="1px" colspan="5" bgcolor="#dbdbdb"></td>
	</tr>';
}

mysql_close($oConn);

$resultado = $resultado . '
	
	<tr>
		<td bgcolor="#FFFFFF" colspan="5" id="OmbraInferiorMenus" class="OmbraInferiorMenus">
	</tr>	
</table>';

echo $resultado;
?>
