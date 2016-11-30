<?php
include("../rao/EstabulariForm_con.php");
session_start();

$PV = sha1(sha1($_POST["PV"]));
$PN = sha1(sha1($_POST["PN"]));

$SQL = "SELECT IdUser FROM Users WHERE IdUser =".$_SESSION["IdUser"]." and Password = '".$PV."'";
$result = mysql_query($SQL,$oConn);

//echo $SQL;
$cuenta = 0;

while($row = @mysql_fetch_array($result))
{
	$cuenta = 1;
	
	$SQL2 = "UPDATE Users SET Password = '$PN' WHERE IdUser = ".$_SESSION["IdUser"];
	$result2 = mysql_query($SQL2,$oConn);
		
}
echo $cuenta;
?>