<?php
include("../../../rao/EstabulariForm_con.php");
include("CanviaElementsStock.php");
include("../../../PHP/Fechas.php"); 
include("ComprovaStock.php");

session_start();

$idPetAnimProd = $_POST["id"];
$valor = $_POST["valor"];
$error = 0;

$c = explode("|",$valor);

$SQL = "SELECT * FROM PetAnimProd WHERE IdPetAnimProd =".$idPetAnimProd;
$result = mysql_query($SQL,$oConn);

//echo $SQL."/_/_/_/_/_/_/";

while ($row = mysql_fetch_array($result))
{
	$IdCC = $row["IdComandaCap"];

	$SQL2 = "SELECT IdProcediment FROM ComandaCap WHERE IdComandaCap =".$IdCC;
	$result2 = mysql_query($SQL2,$oConn);
	
	//echo $SQL2; 
	while ($row2 = mysql_fetch_array($result2))
	{
		$IdProc = $row2["IdProcediment"];
	}	
	
	$sexo = array("M","F");
	
	
	for ($i=0;$i<2;$i++)
	{
		//echo "|||||||i: ".$i."error:".$error."|||||||";
		if ($error == 0)
	//echo "CanviaElementsStock(·".$IdProc.",".$row["IdProcediment"]."·,".$row["IdSoca"].",".$row["IdComandaCap"].",".$sexo[$i].",".$c[$i].",".$row["FechaNac"].")";
			$error = CanviaElementsStock($IdProc,$row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$sexo[$i],$c[$i],$row["FechaNac"]);
			//echo $error.", ";
	}
}

if ($error == 0)
	$SQL = "INSERT INTO PetAnimProdSub (IdPetAnimProd, Mascles, Femelles) VALUES ($idPetAnimProd, ".$c[0].",".$c[1].")";
	$result = mysql_query($SQL,$oConn);

	$SQL = "UPDATE PetAnimProd SET Estado = 1 where IdPetAnimProd = ".$idPetAnimProd;
	$result = mysql_query($SQL,$oConn);

echo $error."|".$IdCC;
?>