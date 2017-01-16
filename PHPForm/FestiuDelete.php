<?php
include("../rao/EstabulariForm_con.php");

session_start();

///:N,:C,:T,:E,:D,:id

$id = $_POST["id"];


$SQL = "DELETE FROM Festiu  WHERE IdFestiu = ".$id;	
$result = mysql_query($SQL,$oConn);

?>