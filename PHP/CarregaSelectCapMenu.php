<?php
include("../rao/sas_con.php");
 
$sel = $_GET["sel"];


$SQL = "SELECT * FROM CapMenu order by Orden";
$result = mysql_query($SQL,$oConn);
 
$resultado = "<option value=0>----------------------------------</option>";

while ($row = mysql_fetch_array($result)){
	
	
	if ($row["IdCapMenu"] == $sel)
	{		
		$resultado = $resultado."<option value=".$row["IdCapMenu"]." selected >".$row["Titol"]."</option>";
	}else
	{
		$resultado = $resultado."<option value=".$row["IdCapMenu"] .">".$row["Titol"]."</option>";
	}
}

mysql_close($oConn);
echo $indice."|".$resultado;

?>
