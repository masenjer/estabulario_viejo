<?php
include("../rao/sas_con.php");
include("Fechas.php");

$id = $_GET["Id"];
if ($id != "")
{
	$SQL = "SELECT * FROM Noticias WHERE IdNoticia = ".$id;
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$T = $row["Titol"];
		$C = $row["Cos"];
		$F = SelectFecha($row["FechaNot"]);
		$FP = SelectFecha($row["FechaPub"]);
		$FD = SelectFecha($row["FechaDesPub"]);
		$IMG = $row["Image"];
	}
}

mysql_close($oConn);

echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id."|".$IMG;

?>