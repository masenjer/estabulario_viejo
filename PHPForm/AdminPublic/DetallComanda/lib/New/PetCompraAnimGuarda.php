<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
		
$SQL ="INSERT INTO CompraAnim(IdComandaCap, IdSoca, IdProv, CantidadM, EM, EUM, CantidadF, EF, EUF, Estado ,IdUser, CT) VALUES (". $_POST["id"].",". $_POST["C"].",". $_POST["prov"].",". $_POST["UM"].",". $_POST["EM"].",". $_POST["EUM"].",". $_POST["UF"].",". $_POST["EF"].",". $_POST["EUF"].",0,". $_SESSION["IdA"].",1)";
$result = mysql_query($SQL,$oConn);

echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>