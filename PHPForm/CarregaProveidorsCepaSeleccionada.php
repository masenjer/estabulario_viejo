<?php
include("../rao/EstabulariForm_con.php");

$idS = $_GET["idS"];

echo $_GET["id"].$_GET["form"]."|";

$SQL = "SELECT IdProveidor FROM Soca WHERE idSoca = ".$_GET["idS"];
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$idP = $row["IdProveidor"];
}


echo  '<option value="0">-------------------</option>';

$SQL = "SELECT * FROM Proveidor Where Actiu = 0 Order by NomProveidor ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	if ($idP == $row["IdProveidor"]) $selected = " selected";
	else $selected = "";
	
	echo '<option value="'.$row["IdProveidor"].'" '.$selected.'>'.$row["NomProveidor"].'</option>'; 
}

//echo $SQL;
?>