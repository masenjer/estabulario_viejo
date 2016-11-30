<?php
include("../rao/sas_con.php");
include("DestacatButton.php");


$SQL = "SELECT IdDestacat, FormatBoto, Imatge, Orden FROM Destacat order by Orden ASC";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">';

while ($row = mysql_fetch_array($result))
{
	$resultado = $resultado . '
	<tr valign="middle">';

		
	if($row["FormatBoto"] == 1)
	{
		$resultado = $resultado . '
			<td height="41px" id="MenuDestacats'.$row["IdDestacat"].'" onClick="CargaDestacatFitxa('.$row["IdDestacat"].');" background="ImgDes/'.$row["Imatge"].'"></td>		
		</tr>';
	}	
	else
	{	
		$resultado = $resultado . '
			<td height="41px" id="MenuDestacats'.$row["IdDestacat"].'" onClick="CargaDestacatFitxa('.$row["IdDestacat"].');">						
				'.CreaDestacatButton($row["Imatge"]).'
			</td>		
		</tr>';
	}
	
	$resultado = $resultado . '<tr><td height="10px"></td></tr>	';		
}

mysql_close($oConn);

$resultado = $resultado . '	
</table>';

echo $resultado;

?>
