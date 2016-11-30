<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
		
$SQL = "INSERT INTO ActiuMOV(IdComandaCap, IdActiu, Unitats, Fecha, Tipus,IdUser,CT) VALUES (".$_POST["id"].",".$_POST["I"].",".$_POST["C"].",'".InsertFecha($_POST["F"])."',".$_POST["r"].",". $_SESSION["IdA"].",1)";
$result = mysql_query($SQL,$oConn);

echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>