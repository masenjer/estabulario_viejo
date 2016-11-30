<?php
include("../rao/sas_con.php");
 
$sel1 = $_GET["sel1"];
$sel2 = $_GET["sel2"];
$id = $_GET["id"];


$SQL = "SELECT * FROM LinMenu WHERE IdCapMenu = $id order by Orden";
$result = mysql_query($SQL,$oConn);
 
$resultado = "<option value=0>----------------------------------</option>";

while ($row = mysql_fetch_array($result)){
	
	
	if ($row["IdLinMenu"] == $sel1)
	{		
		$resultado = $resultado."<option value=".$row["IdLinMenu"]." selected >".$row["Titol"]."</option>";
	}else
	{
		$resultado = $resultado."<option value=".$row["IdLinMenu"] .">".$row["Titol"]."</option>";
	}
}

$SQL = "SELECT * FROM LinMD WHERE IdCapMenu = $id order by Orden";
$result = mysql_query($SQL,$oConn);
 
$resultado = $resultado."|<option value=0>----------------------------------</option>";

while ($row = mysql_fetch_array($result)){
	
	
	if ($row["IdLinMD"] == $sel2)
	{		
		$resultado = $resultado."<option value=".$row["IdLinMD"]." selected >".$row["Titol"]."</option>";
	}else
	{
		$resultado = $resultado."<option value=".$row["IdLinMD"] .">".$row["Titol"]."</option>";
	}
}

mysql_close($oConn);
echo $resultado;

?>
