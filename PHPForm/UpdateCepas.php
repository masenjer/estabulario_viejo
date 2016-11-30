<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];
$T = $_GET["T"];
$idP = $_GET["idP"];

$SQL = "UPDATE Soca SET NomSoca = '$T', IdProveidor = $idP WHERE IdSoca = $id"; 
$result = mysql_query($SQL,$oConn);

mysql_close($oConn);

echo "Cepa editada correctament";
?>