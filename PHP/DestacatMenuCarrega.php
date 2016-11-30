<?php
include("../rao/sas_con.php");
session_start();



$SQL = "SELECT * FROM Destacat order by Orden ASC";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">';

	if (($_SESSION["Noticias"]=="1") && ($_GET["h"]=='1'))
	{	
		$resultado = $resultado.'<tr><td align="right" height="25px"><img src="img/ButtonEditContingut.png" style="cursor:pointer;" onClick="AbreGestorDestacats();"></td></tr>';
	}

while ($row = mysql_fetch_array($result))
{
	$resultado = $resultado . '
	<tr valign="middle">';

	if ($_GET["h"]!='1')	
	{	
		$accion =  'onClick="CargaDestacatFitxa('.$row["IdDestacat"].');"';
		$resultado = $resultado . '
	<td width="15px"><input type="text" id="OrdreDestatcat'.$row["IdDestacat"].'"  style="width:15px; height:35px; vertical-align:middle;" value="'.$row["Orden"].'"  onKeyPress="submitenter(9,event,'.$row["IdDestacat"].')"></td>';
	
	}else
	{
		if ($row["TipusEnllac"] == 1)
		{
			$accion = ' onClick="CarregaEnllacIntern(\''.$row["URL"].'\');"'; 
		}else
		{
			if ($row["TipusEnllac"] == 2) 	$accion = ' onClick="window.open(\''.$row["URL"].'\');"'; 
			else $accion = ' onClick="window.open(\'Documents/'.$row["URL"].'\');"'; 
		}
	}
		
	if($row["FormatBoto"] == 1)
	{
		$resultado = $resultado . '
			<td height="41px" id="MenuDestacats'.$row["IdDestacat"].'" '.$accion.' background="ImgDes/'.$row["Imatge"].'"></td>		
		</tr>';
	}	
	else
	{	
		$resultado = $resultado . '
			<td height="41px" id="MenuDestacats'.$row["IdDestacat"].'" '.$accion.' >						
				'.CreaDestacatButton($row["Imatge"],$_GET["h"] ).'
			</td>		
		</tr>';
	}
	
//	if ($_GET["h"]=='1')	
//	{
//	$resultado = $resultado . '<tr><td height="10px"></td></tr>	';		
//	}
}

mysql_close($oConn);

$resultado = $resultado . '	
</table>';

echo $resultado;

function CreaDestacatButton($cadena, $home)
{
	$c = explode("|",$cadena);
	
	if ($home == 1) $width = "198px";	
	else $width = "186px";
	
	return '

	<table cellspacing="0" cellpadding="0" border="0">
	  <tr>
		  <td colspan="3" height="1px" style=" background-color:'.$c[0].';"></td>
	  <tr>
	  <tr valign="middle">
		  <td style=" background-color:'.$c[0].'; width:1px;"></td>
		  <td>
			  <div style="height:41px; background-color:'.$c[0].';">
				  <div style="width:'.$width.';height:41px;background:URL(img/MaskButton.png);">
					  <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
						  <tr valign="middle">
							  <td width="100%" height="100%" valign="middle" align="center">
								  <div class="DivTextButtonProva" style="color:'.$c[1].';">'.$c[2].'</div>
							  </td>
						  </tr>
					  </table>
			  </div></div>
		  </td>
		  <td style=" background-color:'.$c[0].'; width:1px;"></td>
	  </tr>	
	  <tr>
		  <td height="1px" colspan="3" style=" background-color:'.$c[0].';"></td>
	  <tr>
  </table> 
';	
}
?>
