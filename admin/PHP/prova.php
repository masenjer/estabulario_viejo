<?php
include("../rao/graal_con.php"); 

$SQL = "SELECT * FROM CapMenu";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
		echo $row["Titol"];
}

mysql_close($oConn);

echo "joder";
?>