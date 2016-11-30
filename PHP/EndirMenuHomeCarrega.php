<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 
session_start();


if ($_SESSION["Noticias"]=="1")
{	
	$permiso = '<img src="img/ButtonEditContingut.png" style="cursor:pointer; height:20px" onClick="AbreGestorEnDir();">';
}


$SQL = "SELECT * FROM EnDirHome order by Orden ASC";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteEnDirHome">
	<tr>
		<td colspan="5" align="right">'.$permiso.'</td>
	</tr>
	<tr>
		<td height="1px" colspan="5" bgcolor="#dbdbdb"></td>
	</tr>';

while ($row = mysql_fetch_array($result))
{
	$accion = ' onClick="'.$row["URL"].'"';
//	if ($row["TipusEnllac"] == 1)
//	{
//		$accion = ' onClick="CarregaEnllacIntern(\''.$row["URL"].'\');"'; 
//	}else
//	{
//		if ($row["TipusEnllac"] == 2) 	$accion = ' onClick="window.open(\''.$row["URL"].'\');"'; 
//		else $accion = ' onClick="window.open(\'Documents/'.$row["URL"].'\');"'; 
//	}
	
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="1px" bgcolor="#dbdbdb"></td>
		<td width="10px"></td>
		<td height="20px" id="MenuEnDir'.$row["IdEnDirHome"].'" align="left" '.$accion.'>'.$row["Titol"].'
		</td>
		<td width="20px" valign="middle" align="center"> <img src="img/FlechaEnDir.png"> </td>
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
