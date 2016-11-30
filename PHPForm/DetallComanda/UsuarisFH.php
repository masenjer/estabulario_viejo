<?php
function CarregaUsuarisFH($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM UsuariFH
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);

	$resultado = ' 	
	<table cellpadding="2" cellspacing="0" border="0" style="border:1px solid #9e9885">
		<tr class="CapcaGrid" align="left" style="text-align:left;">
			<td colspan="2">Usuaris que demanen entrada</td>
		</tr>';
	
	if ( mysql_num_rows($result) > 0)		
	{
		$i=0;		
		while ($row = mysql_fetch_array($result))
		{
			$i %=2;
			
			$resultado .= '
			<tr>
				<td class="GridLine'.$i.'">'.$row["Nom"]. " " .$row["Cognoms"].':</td>
				<td class="GridLine'.$i.'" style="padding-left:5px">  ' .$row["NIF"]."</td>
			<tr>";
			
			$i++;
		}
	}

	return $resultado;
}
?>