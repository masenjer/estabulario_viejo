<?php

include("../rao/EstabulariForm_con.php");

$a = $_GET["a"];
$id = $_GET["id"];

echo $a . "|";

$SQL = "SELECT * FROM Soca where IdEspecie = ".$id." order by NomSoca"; 
$result = mysql_query($SQL,$oConn);

echo '<option value="">-------------------------</option>';

while ($row = mysql_fetch_array($result)){
echo '<option value="'.$row["IdSoca"].'">'.$row["NomSoca"].'</option>'; 
}

mysql_close($oConn);


?>