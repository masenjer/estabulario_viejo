<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];

$SQL = "DELETE FROM Tecnics WHERE IdUser = $id";
$result = mysql_query($SQL,$oConn);


//echo $SQL;
?>