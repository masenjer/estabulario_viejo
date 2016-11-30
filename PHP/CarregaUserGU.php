<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];

$SQL = "SELECT * FROM Tecnics WHERE IdTecnic = ".$id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$N = $row["Nom"];
	$C = $row["Cognoms"];
	$E= $row["Email"];
	$U = $row["User"];
	$P = $row["Password"];
	$R1 = $row["Usuarios"];
	$R2 = $row["Creacio"];
	$R3 = $row["Edicio"];
	$R4 = $row["Noticias"];
	$R5 = $row["WebUsers"];
	$R6 = $row["Proveidors"];
	$R7 = $row["Investigadors"];
	$R8 = $row["Procediments"];
	$R9 = $row["Stock"];
	$R10 = $row["Comandes"];
	$R11 = $row["PEmail"];
	$R12 = $row["Fungibles"];
	$R13 = $row["EspeciesiSoques"];
	$R14 = $row["InformeFacturacio"];
	$R15 = $row["InformeDiari"];
	
}

mysql_close($oConn);

echo $N."|".$C."|".$E."|".$U."||".$R1."|".$R2."|".$R3."|".$R4."|".$R5."|".$R6."|".$R7."|".$R8."|".$R9."|".$R10."|".$R11."|".$R12."|".$R13."|".$R14."|".$R15."|".$id;

?>