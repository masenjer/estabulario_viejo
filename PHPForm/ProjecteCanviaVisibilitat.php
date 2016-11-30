<?php
include("../rao/EstabulariForm_con.php");

$id = $_POST["id"];
$val = $_POST["actiu"];

$val = ($val+1)%2;

echo $val;

$SQL = "UPDATE Projecte SET Actiu = ".$val." where IdProjecte= ".$id;
$result = mysql_query($SQL,$oConn);

$SQL = "SELECT IdInvestigador FROM Projecte WHERE IdProjecte= ".$id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo "|".$row["IdInvestigador"];	
}
?>