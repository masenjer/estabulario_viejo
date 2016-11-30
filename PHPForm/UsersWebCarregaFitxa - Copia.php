<?php
include("../rao/EstabulariForm_con.php");
include("UsersWebBotoEstat.php");

$SQL = "SELECT COUNT(*) AS Cuenta from Users WHERE Validado = 0";

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo $row["Cuenta"];
}


?>