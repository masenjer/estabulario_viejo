<?php
include("../rao/sas_con.php");
 
$SQL = "SELECT * FROM Users order by Cognoms,Nom";
$result = mysql_query($SQL,$oConn);
 
$resultado = '<option value="">-----------------------</option>';

while ($row = mysql_fetch_array($result)){	
	$resultado = $resultado.'<option value="'.$row["IdUser"] .'">'.$row["Nom"]." ".$row["Cognoms"].'</option>';
}

mysql_close($oConn);
echo $resultado;

?>
