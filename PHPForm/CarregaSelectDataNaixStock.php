<?php
include("../rao/EstabulariForm_con.php");
include("../PHP/Fechas.php"); 

$SQL = "SELECT DISTINCT FechaNacimiento FROM AnimalMOVCap WHERE IdSoca = ".$_GET["id"]." order by FechaNacimiento DESC";
$result = mysql_query($SQL,$oConn);
 
$resultado = '<option value="">-----------------------</option>';

while ($row = mysql_fetch_array($result)){
	
	if ($row["FechaNacimiento"] == $_GET["f"]) $selected = "selected";
	else $selected = "";	
	$resultado = $resultado.'<option value="'.$row["FechaNacimiento"] .'" '.$selected.'>'.SelectFecha($row["FechaNacimiento"]).'</option>';
}

mysql_close($oConn);
echo $resultado;

?>
