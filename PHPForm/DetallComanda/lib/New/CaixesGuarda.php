<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
		
$SQL = "INSERT INTO Caixa(IdComandaCap, Unidades, IdMidaCaixa, IdTipusCaixa,  Menjar, IdUser) VALUES (". $_POST["id"].",". $_POST["U"].",". $_POST["M"].",".$_POST["T"].",".$_POST["A"].",". $_SESSION["IdA"].")";
$result = mysql_query($SQL,$oConn);

//echo $SQL2;
echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>