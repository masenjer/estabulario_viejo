<?php
include("../rao/EstabulariForm_con.php");

$op = $_POST["op"];
$id = $_POST["id"];
$val = $_POST["actiu"];

$val = ($val+1)%2;

$SQL = "UPDATE Proveidor SET Actiu = ".$val." where IdProveidor = ".$id;
$result = mysql_query($SQL,$oConn);

echo $op;

?>