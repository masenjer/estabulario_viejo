<?php
include("../rao/EstabulariForm_con.php");

	$NProc = $_GET["NProc"];
	
	$SQL = "SELECT IdProcediment FROM Procediment WHERE NumProc = $NProc";
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		echo $row["IdProcediment"];
	}

?>