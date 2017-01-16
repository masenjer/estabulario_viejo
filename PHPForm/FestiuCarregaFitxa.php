<?php
include("../rao/EstabulariForm_con.php");
include("UsersWebBotoEstat.php");
include("../PHP/Fechas.php");

$SQL = "SELECT * from Festiu WHERE IdFestiu =".$_GET["id"];

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo SelectFecha($row["diaFestiu"]).'|'.$row["IdFestiu"];
}
?>