<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php");

$N = Pon($_POST["N"]);
$T = $_POST["T"];

$SQL = "INSERT INTO Proveidor (NomProveidor, Tipus) VALUES ('$N',$T)";
$result = mysql_query($SQL,$oConn);

echo $T;
?>