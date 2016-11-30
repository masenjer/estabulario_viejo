<?php
include("../rao/sas_con.php");

$id = $_GET["id"];

$SQL = "DELETE FROM EnDirHome WHERE IdEnDirHome =".$id;
$result = mysql_query($SQL,$oConn);

echo $id;
?>