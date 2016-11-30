<?php
include("../rao/sas_con.php");

$id = $_GET["id"];
$Orden = 0;

$SQL = "SELECT Orden from LinMD WHERE IdCapMenu = " . $id . " ORDER By Orden Desc LIMIT 1" ;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$Orden = $row["Orden"] + 1;
}



$SQL = "INSERT INTO LinMD( Titol, Descripcio,  IdCapMenu,Orden) VALUES ('Nueva P&aacute;gina', 'Descripció', ".$id.",$Orden)  ";
$result = mysql_query($SQL,$oConn);

echo $id;
?>