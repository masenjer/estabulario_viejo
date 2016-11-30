<?php
include("../rao/sas_con.php");

$idCap = $_GET["IdCap"];
$IdLin = $_GET["IdLin"];

$Orden = 0;

$SQL = "SELECT Orden from LinMenu WHERE IdCapMenu = " . $idCap . " ORDER By Orden Desc LIMIT 1" ;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$Orden = $row["Orden"] + 1;
}

$SQL = "INSERT INTO LinMenu(IdCapMenu, IdLinMenuRel, Titol,Orden, Tipus) VALUES ($idCap,$IdLin,'Nueva P&aacute;gina',$Orden,0) ";
$result = mysql_query($SQL,$oConn);

echo $idCap;//."|".$IdLin;
?>