<?php
include("../rao/EstabulariForm_con.php");
include("UsersWebBotoEstat.php");

$SQL = "SELECT * from Investigador WHERE IdInvestigador =".$_GET["id"];

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo $row["Nom"].'|'.$row["Cognoms"].'|'.$row["Telefon"].'|'.$row["Email"].'|'.$row["Departament"].'|'.$row["IdInvestigador"];
}
?>