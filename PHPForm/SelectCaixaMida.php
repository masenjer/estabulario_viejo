<?php
include("../rao/EstabulariForm_con.php");
 
echo '<option value="0">--------</option>';

$SQL = "SELECT * FROM MidaCaixa ";

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo '<option value="'.$row["IdMidaCaixa"].'">'.$row["NomMidaCaixa"].'</option>'; 
}

//echo $SQL;
?>