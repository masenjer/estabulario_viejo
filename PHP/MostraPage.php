<?php
error_reporting (5); 
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

$id = $_GET["id"]; 

switch($_GET["op"])
{
	case 1: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMenu WHERE IdLinMenu = " . $id;
				break;
	case 2: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMD WHERE  IdLinMD = " . $id;
				break;

}

/////Primero compruebo que no se trate de un nodo padre

	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$Titol = $row["Titol"];
		$Titol = Quita($Titol);
		
		$Contingut = $row["Contingut"];
		//$Contingut = Quita($Contingut);
		$IdCap = $row["IdCapMenu"];
	}




$SQL = "SELECT Titol FROM CapMenu WHERE IdCapMenu = ".$IdCap;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$TitolCap = $row["Titol"];
}

mysql_close($oConn);


if ($_GET["op"] == "1")
{
	if ($Id != '84')
	{
		$Ruta = '<a href onclick="MostraHome();">Inici</a>> '.$TitolCap." > ".BuscaRuta($id);
	}
	else
	{
		$Titol = "";	
	}
}

echo $Titol ."|". $Contingut."|".$Ruta."|".$id.",".$_GET["op"]."|".$IdCap;
?>

<?php
function BuscaRuta($IdLin)
{
	include("../rao/sas_con.php");
	
	$SQL = "SELECT Titol,IdLinMenuRel, IdCapMenu FROM LinMenu WHERE IdLinMenu = ".$IdLin;
	$result = mysql_query($SQL,$oConn);

	while ($row = mysql_fetch_array($result))
	{
		if ($row["IdLinMenuRel"] == 0)
		{
			return '<b>'.$row["Titol"].'</b>';
		}
		else
		{
			return BuscaRuta($row["IdLinMenuRel"])." > ". $row["Titol"];
		}
	}
	mysql_close($oConn);
}
?>