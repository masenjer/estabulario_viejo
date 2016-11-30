<?php
include("../rao/EstabulariForm_con.php");

$taula = $_POST["taula"];
$id = $_POST["id"];
$val = $_POST["actiu"];

$val = ($val+1)%2;

$SQL = "UPDATE ".$taula." SET Actiu = ".$val." where Id".$taula." = ".$id;
$result = mysql_query($SQL,$oConn);

echo $val;

?>