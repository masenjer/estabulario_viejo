<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 


$id = $_GET["id"];
$Titol = $_GET["Titol"];
$Titol = Pon($Titol);
$TE = $_GET["TE"];
$URL = $_GET["URL"];

$SQL = "UPDATE Contacte SET 
			Titol = '$Titol',
			Contingut = '$TE', 
			URL = '$URL'";
							
$result = mysql_query($SQL,$oConn);

?>