<?php
include("../rao/EstabulariForm_con.php");

$SQL = "SELECT * FROM Procediment where IdProcediment = ".$_GET["id"];
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	echo /*$row["NIUInvestigador"].*/"|".$row["IdInvestigador"]."|".$row["NumProc"]."|".$row["NumOrdre"]."|".$row["Estat"]."|".$row["IdEspecie"]."|".$_GET["id"];
}
?>