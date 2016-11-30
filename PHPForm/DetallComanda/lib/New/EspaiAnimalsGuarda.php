<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
	
///id:id,E:E,C:C,U:U,Edad:Edad,J:J,S:S,SG:SG	
		
$SQL = "INSERT INTO EspaiAnimals(IdComandaCap, IdSoca, Sexo, Cant, EP, UEP, AJ, IdUser, CT)
		 VALUES (". $_POST["id"].",". $_POST["C"].",". $_POST["S"].",". $_POST["U"].",". $_POST["Edad"].",". $_POST["SG"].",". $_POST["J"].",". $_SESSION["IdA"].",1)";
$result = mysql_query($SQL,$oConn);

echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>