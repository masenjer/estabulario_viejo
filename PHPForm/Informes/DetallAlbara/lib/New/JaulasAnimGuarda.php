<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
		
$SQL = "INSERT INTO JaulasAnimLin(IdComandaCap, IdSoca, Cantidad, RatonID,  Estado, IdUser, CT) VALUES (". $_POST["id"].",". $_POST["C"].",". $_POST["U"].",'".$_POST["F"]."',0,". $_SESSION["IdA"].",1)";
$result = mysql_query($SQL,$oConn);

echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>