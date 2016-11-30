<?php
include("../rao/EstabulariForm_con.php");
session_start();

if ($_SESSION["IdUser"])
{ 	
	$SQL = "SELECT * FROM Users where IdUser = ".$_SESSION["IdUser"]; 
	$result = mysql_query($SQL,$oConn);
	
	
	while ($row = mysql_fetch_array($result)){
	$aux = 1;
	
	$Nom = $row["Nom"] ." ". $row["Cognoms"];
	
	echo $aux."|".$Nom."|".$row["Mailing"];
   
	}

}
else echo 2;
   
?>