<?php
include("../rao/sas_con.php");

$IdCap = $_GET["IdCap"];

$SQL = "DELETE FROM LinMenu WHERE IdCapMenu = " . $IdCap; 
$result = mysql_query($SQL,$oConn);

$SQL = "DELETE FROM CapMenu WHERE IdCapMenu = " . $IdCap; 
$result = mysql_query($SQL,$oConn);

?>