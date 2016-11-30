<?php
include("../rao/sas_con.php");

$id = $_GET["id"];

$SQL = "SELECT * FROM EnDirHome WHERE IdEnDirHome = ".$id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$Titol = $row["Titol"];
	$TE = $row["TipusEnllac"];
	$URL = $row["URL"];
}

mysql_close($oConn);

echo $Titol."*****".$TE."*****".$URL."*****".$id;

?>