<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();

//id:id,E:E,S:S,P:P,G:G,C:C
		
$SQL = "INSERT INTO JaulasJaulaLin(IdComandaCap, IdSoca, Sala, Posicion, NumJaula, IdUser, CT) VALUES (". $_POST["id"].",". $_POST["C"].",'". $_POST["S"]."','". $_POST["P"]."','".$_POST["G"]."',". $_SESSION["IdA"].",1)";
$result = mysql_query($SQL,$oConn);

echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>