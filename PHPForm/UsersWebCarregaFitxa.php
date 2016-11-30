<?php
include("../rao/EstabulariForm_con.php");
include("UsersWebBotoEstat.php");

$SQL = "SELECT * from Users WHERE IdUser =".$_GET["id"];

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo $row["User"].'|'.$row["Password"].'|'.$row["NIU"].'|'.$row["Nom"].'|'.$row["Cognoms"].'|'.$row["Email"].'|'.$row["Telefono"].'|'.$row["Centro"].'|'.$row["Investigador"].'|'.$row["EmailInvestigador"]."|".MostraBotonsEstatUsersWeb($_GET["id"],$row["Validado"]);
}


?>