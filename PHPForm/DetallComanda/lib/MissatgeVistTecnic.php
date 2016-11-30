<?php
include("../../../rao/EstabulariForm_con.php");

$id = $_POST["id"];

$SQL = "UPDATE ComandaCap SET AvisT = 0 where IdComandaCap = ".$id;
$result = mysql_query($SQL,$oConn);

echo $SQL;

?>