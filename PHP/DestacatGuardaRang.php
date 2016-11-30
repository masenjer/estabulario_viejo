<?php
include("../rao/sas_con.php");

$id = $_GET["id"];
$rang = $_GET["rang"];

$SQL = "UPDATE Destacat SET Orden = ".$rang." WHERE IdDestacat =" . $id;
$result = mysql_query($SQL,$oConn);

?>