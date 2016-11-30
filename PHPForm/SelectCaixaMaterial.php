<?php
include("../rao/EstabulariForm_con.php");
 
echo '<option value="0">--------</option>';

$SQL = "SELECT * FROM TipusCaixa ";

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo '<option value="'.$row["IdTipusCaixa"].'">'.$row["NomTipusCaixa"].'</option>'; 
}

//echo $SQL;
?>