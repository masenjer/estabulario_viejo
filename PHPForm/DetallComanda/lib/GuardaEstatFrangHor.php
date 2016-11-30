<?php
include("../../../rao/EstabulariForm_con.php");

$id = $_POST["id"];
$val = $_POST["val"];

$SQL = "UPDATE FrangHor SET Estat = ".$val." where IdFrangHor = ".$id;
$result = mysql_query($SQL,$oConn);


echo $_POST["idCC"];
?>