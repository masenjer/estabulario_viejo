<?php
include("../../rao/EstabulariForm_con.php");

$SQL = "SELECT Email from Users WHERE Mailing = 1 and Validado = 2 ";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$cadena .= $row["Email"].", ";
}

//echo $cadena;


header('Content-type: text/plain');

// It will be called report.txt
header('Content-Disposition: attachment; filename="lista.txt"');

print($cadena);

?>