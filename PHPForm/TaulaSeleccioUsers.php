<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];
$IdUNOT = "";
$esta = 0;

$SQL = "SELECT IdUser
		FROM ProcedimentUser
		WHERE IdProcediment = $id";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	if ($IdUNOT) $IdUNOT = $IdUNOT . "|" . $row["IdUser"];
	else $IdUNOT = $row["IdUser"];
}

$fila = explode("|", $IdUNOT);

$resultado = '
	<table width="100%" cellpadding="0" cellspacing="0" border="0" >
		<tr class="CapGrid">
			<td height="27px" class="CapcaGrid">Usuario a a&ntilde;adir</td>			
		</tr>';

$SQL = "SELECT IdUser, Nom, Cognoms 
		FROM Users 
		WHERE Validado = 2 
		ORDER BY Users.Cognoms, Users.Nom ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	foreach($fila as $row2)
	{
		if ($row2 == $row["IdUser"])
		{
			$esta = 1;
		} 
	}
	if ($esta == 0)
	{
		$resultado = $resultado.'
			<tr>
				<td class="fuenteForm" height="25px" onclick="AfegeixUseraProc('.$id.','.$row["IdUser"].')"  style="cursor:pointer; padding:5px;">'.$row["Cognoms"].', '.$row["Nom"].'</td>				
			</tr>
		';
	}
	$esta = 0;
}

$resultado = $resultado.'</table>';

mysql_close($oConn);

echo $resultado;

?>