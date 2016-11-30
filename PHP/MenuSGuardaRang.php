<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$id = $_GET["id"];
$rang = $_GET["rang"];

$SQL = "UPDATE CapMenu SET Orden = ".$rang." WHERE IdCapMenu =" . $id;
$result = mysql_query($SQL,$oConn);

?>