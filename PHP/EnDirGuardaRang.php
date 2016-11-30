<?php
include("../rao/sas_con.php");

$id = $_GET["id"];
$rang = $_GET["rang"];

$SQL = "UPDATE EnDirHome SET Orden = ".$rang." WHERE IdEnDirHome =" . $id;
$result = mysql_query($SQL,$oConn);

?>