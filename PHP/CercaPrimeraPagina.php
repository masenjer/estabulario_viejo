<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$IdCap = $_GET["IdCap"]; 

/////Primero compruebo que no se trate de un nodo padre
$SQL = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$IdCap." order by Orden ASC LIMIT 1";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo $row["IdLinMenu"];
}

mysql_close($oConn);

?>