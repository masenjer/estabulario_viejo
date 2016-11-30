<?php
include("../rao/EstabulariForm_con.php");

$idP = $_GET["idP"];
$IdU = $_GET["IdU"];

$SQL = "INSERT INTO ProcedimentUser(IdProcediment, IdUser) VALUES ($idP, $IdU)";
$result = mysql_query($SQL,$oConn);

echo $idP;
?>