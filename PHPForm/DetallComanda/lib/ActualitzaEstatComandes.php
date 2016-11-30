<?php
include("../../../rao/EstabulariForm_con.php");

$id = $_POST["id"];
$val = $_POST["estat"];

$SQL = "UPDATE ComandaCap SET Facturada = ".$val." where IdComandaCap = ".$id;
$result = mysql_query($SQL,$oConn);

echo $SQL;

?>