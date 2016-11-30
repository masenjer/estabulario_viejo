<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$SQL = "SELECT IdNoticia, Titol FROM Noticias order by IdNoticia DESC";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">';

while ($row = mysql_fetch_array($result))
{
	$resultado = $resultado . '
	<tr valign="middle">
		<td height="40px" id="MenuNoticias'.$row["IdNoticia"].'" onClick="CargaNoticias('.$row["IdNoticia"].')" background="img/LinHistoricoNoticias.png" align="center">						
			'.$row["Titol"].'
		</td>		
	</tr>';
}

mysql_close($oConn);

$resultado = $resultado . '	
</table>';

echo $resultado;
?>
