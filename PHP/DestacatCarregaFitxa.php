<?php
include("../rao/sas_con.php");

$id = $_GET["id"];

$SQL = "SELECT * FROM Destacat WHERE IdDestacat = ".$id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$FB = $row["FormatBoto"];
	$IMG = $row["Imatge"];
	$TE = $row["TipusEnllac"];
	$URL = $row["URL"];
}

mysql_close($oConn);

echo $FB."*****".$IMG."*****".$TE."*****".$URL."*****".$id;

?>