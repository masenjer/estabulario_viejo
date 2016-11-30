<?php
include("../rao/sas_con.php");

$idCap = $_GET["IdCap"];
$IdLin = $_GET["IdLin"];

$SQL = "DELETE FROM LinMenu WHERE IdLinMenu = " . $IdLin; 
$result = mysql_query($SQL,$oConn);

echo $idCap;//."|".$IdLin;
?>