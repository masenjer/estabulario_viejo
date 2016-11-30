<?php
include("../rao/EstabulariForm_con.php");
session_start();

$resultado = '<option value="0">------</option>';

$SQL = "SELECT Procediment.IdProcediment, Procediment.NumProc 
		FROM Procediment
		INNER JOIN ProcedimentUser 
		ON Procediment.IdProcediment = ProcedimentUser.IdProcediment
		WHERE ProcedimentUser.IdUser = ". $_SESSION["IdUser"]."
		AND Procediment.Estat <> 3
		ORDER BY Procediment.NumProc
		";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$resultado =  $resultado . '<option value="'.$row["IdProcediment"].'">'.$row["NumProc"].'</option>';
}

echo $_GET["form"]."|".$resultado;

?>