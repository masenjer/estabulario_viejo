<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];
$idP = $_GET["idP"];

$SQL = "DELETE FROM ProcedimentUser WHERE IdProcedimentUser = $id";
$result = mysql_query($SQL,$oConn);

echo $idP;
?>