<?php
include("../rao/EstabulariForm_con.php");

$CA = $_GET["CA"];
$ES = $_GET["ES"];
$EN = $_GET["EN"];

$SQL = "INSERT INTO Especie (NomEspecie_ca,NomEspecie_es,NomEspecie_en)VALUES('$CA','$ES','$EN')"; 
$result = mysql_query($SQL,$oConn);

mysql_close($oConn);

echo "Especie guardada correctament";
?>