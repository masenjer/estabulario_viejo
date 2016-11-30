<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$id = $_GET["id"];
$titol = $_GET["titol"];
$titol2 = Pon($titol);

$SQL = "UPDATE LinMD SET Descripcio = '".$titol2."' WHERE IdLinMD =" . $id;
$result = mysql_query($SQL,$oConn);

echo $id."|".Quita($titol);
?>