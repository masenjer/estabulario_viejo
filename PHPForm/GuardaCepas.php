<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];
$T = $_GET["T"];
$idP = $_GET["idP"];

$SQL = "INSERT INTO Soca (IdEspecie,NomSoca,IdProveidor)VALUES($id,'$T',$idP)"; 
$result = mysql_query($SQL,$oConn);

mysql_close($oConn);

echo "Cepa guardada correctament";
?>