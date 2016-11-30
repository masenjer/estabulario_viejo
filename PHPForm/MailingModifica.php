<?php
include("../rao/EstabulariForm_con.php");
session_start();

$m = $_GET["m"];

$m = ($m + 1)%2;

$SQL = "UPDATE Users SET Mailing = ".$m." WHERE IdUser = ".$_SESSION["IdUser"];  
$result = mysql_query($SQL,$oConn);

echo $m;
   
?>