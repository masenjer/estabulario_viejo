<?php

include("../rao/EstabulariForm_con.php");

$a = $_GET["a"];

echo $a . "|";

$SQL = "SELECT * FROM Especie order by NomEspecie_ca"; 
$result = mysql_query($SQL,$oConn);

echo '<option value="">-------</option>';

while ($row = mysql_fetch_array($result)){
echo '<option value="'.$row["IdEspecie"].'">'.$row["NomEspecie_ca"].'</option>'; 
}

mysql_close($oConn);


?>