<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
		
$SQL = "INSERT INTO PetHemAc(IdComandaCap, IdSoca, Cantidad, Fecha,  Estado, IdUser, CT) VALUES (". $_POST["id"].",". $_POST["C"].",". $_POST["U"].",'".InsertFecha($_POST["F"])."',0,". $_SESSION["IdA"].",1)";
$result = mysql_query($SQL,$oConn);

echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>