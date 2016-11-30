<?php
include("../rao/EstabulariForm_con.php");
 
echo  '<option value="">-------------------</option>';

$SQL = "SELECT * FROM Investigador Order by Cognoms, Nom ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo '<option value="'.$row["IdInvestigador"].'">'.$row["Cognoms"].', '.$row["Nom"].'</option>'; 
}

//echo $SQL;
?>