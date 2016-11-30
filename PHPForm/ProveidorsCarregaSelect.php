<?php
include("../rao/EstabulariForm_con.php");
 
echo  $_GET["sel"].'|<option value="0">-------------------</option>';

$op =  $_GET["op"];

if ($op != "3") $SQL = "SELECT * FROM Proveidor Where Tipus = ".$_GET["op"]." and Actiu = 0 Order by NomProveidor ASC";
else $SQL = "SELECT * FROM Proveidor Where Actiu = 0 Order by NomProveidor ASC";

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo '<option value="'.$row["IdProveidor"].'">'.$row["NomProveidor"].'</option>'; 
}

//echo $SQL;
?>