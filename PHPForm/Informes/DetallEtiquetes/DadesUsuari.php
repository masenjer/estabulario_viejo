<?php
function MostraDadesUsuari($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT * FROM Users WHERE IdUser = ".$id;
	$result = mysql_query($SQL,$oConn);

	$r='<table style="border:1px solid #9e9885" cellpadding="5">';
	while ($row = mysql_fetch_array($result))
	{
		$r .= '
			<tr>
				<td><b>NIU:</b></td>
				<td>'.$row["NIU"].'</td>
			</tr>
			<tr>
				<td><b>Nom:</b></td>
				<td>'.$row["Nom"].' '.$row["Cognoms"].'</td>
			</tr>
			<tr>
				<td><b>Email:</b></td>
				<td>'.$row["Email"].'</td>
			</tr>
			<tr>
				<td><b>Tel&egrave;fon:</b></td>
				<td>'.$row["Telefono"].'</td>
			</tr>
			<tr>
				<td><b>Centre:</b></td>
				<td>'.$row["Centro"].'</td>
			</tr>';
	}
	$r.='</table>';
	
	return $r;

}
?>