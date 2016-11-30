<?php

include("../rao/EstabulariForm_con.php");

$div = $_GET["div"];
$t = $_GET["t"];

switch($t)
{
	case "Dietes": $T="Dieta";
					break;
	default: $T=$t;
}

echo $div . "|";

$SQL = "SELECT * FROM ".$T." Where Actiu = 0 order by Nom".$T.""; 
$result = mysql_query($SQL,$oConn);

echo '<option value="">-------------------------</option>';

while ($row = mysql_fetch_array($result)){
echo '<option value="'.$row["Id".$T].'">'.$row["Nom".$T].'</option>'; 
}

mysql_close($oConn);


?>