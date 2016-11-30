<?php
include("../../../rao/EstabulariForm_con.php");

session_start();

//////id:id,num:num,taula:taula,idCC:idCC

$id = $_POST["id"];
$taula = $_POST["taula"];
$val = $_POST["num"];
$idCC = $_POST["idCC"];

$SQL = "UPDATE ".$taula." SET Estado = ".$val." where Id".$taula." = ".$id;
$result = mysql_query($SQL,$oConn);

echo $idCC;
//echo $SQL;
?>