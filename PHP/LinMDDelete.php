<?php
include("../rao/sas_con.php");

$IdLinMD = $_GET["IdLinMD"];

$SQL = "SELECT * FROM LinMD WHERE IdLinMD = " . $IdLinMD;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$IdCap = $row["IdCapMenu"];
}

$SQL = "DELETE FROM LinMD WHERE IdLinMD = " . $IdLinMD; 
$result = mysql_query($SQL,$oConn);

echo $IdCap;//."|".$IdLin;
?>