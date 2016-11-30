<?php
include("../../../../rao/EstabulariForm_con.php");
include("../../../../PHP/Fechas.php"); 

session_start();
		
$SQL = "DELETE FROM Caixa WHERE IdCaixa =".$_POST["id"];

$result = mysql_query($SQL,$oConn);

//echo $SQL2;
echo $_POST["idCC"];
//echo $_POST["id"]."|".$SQL."|".$_SESSION["IdA"];
?>