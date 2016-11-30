<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$id = $_GET["id"];
$rang = $_GET["rang"];

$SQL = "UPDATE LinMenu SET Orden = ".$rang." WHERE IdLinMenu =" . $id;
$result = mysql_query($SQL,$oConn);

$SQL = "SELECT IdCapMenu from LinMenu WHERE IdLinMenu =" . $id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo $row["IdCapMenu"];	
}

?>