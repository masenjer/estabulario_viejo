<?php
include("../rao/EstabulariForm_con.php");
 
echo  $_GET["sel"].'|<option value="0">-------------------</option>';

$id =  $_GET["id"];

$SQL = "SELECT * FROM Investigador Order by Cognoms, Nom ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	if ($id == $row["IdInvestigador"]) $sel = " selected ";
	else $sel = "";
	
	echo '<option value="'.$row["IdInvestigador"].'" '.$sel.'>'.$row["Cognoms"].', '.$row["Nom"].'</option>'; 
}

//echo $SQL;
?>