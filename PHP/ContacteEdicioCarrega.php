<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$SQL = "SELECT * FROM Contacte";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$T = $row["Titol"];
	$C = $row["Contingut"];
	$U = $row["URL"];
}

mysql_close($oConn);

echo $T."*****".$C."*****".$U;

?>