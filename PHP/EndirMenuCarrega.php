<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$SQL = "SELECT IdEnDirHome, Titol, Orden FROM EnDirHome order by Orden  ASC";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">';

while ($row = mysql_fetch_array($result))
{
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="15px"><input type="text" id="OrdreEnDir'.$row["IdEnDirHome"].'"  style="width:15px; height:34px; vertical-align:middle;" value="'.$row["Orden"].'"  onKeyPress="submitenter(10,event,'.$row["IdEnDirHome"].')"></td>
		<td height="40px" id="MenuEnDir'.$row["IdEnDirHome"].'" onClick="CargaEnDirFitxa('.$row["IdEnDirHome"].')" background="img/LinHistoricoNoticias.png" align="center">						
			'.$row["Titol"].'
		</td>		
	</tr>';
}

mysql_close($oConn);

$resultado = $resultado . '	
</table>';

echo $resultado;
?>
