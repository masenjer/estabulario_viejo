<?php
include("../../../rao/EstabulariForm_con.php");
include("CanviaElementsStock.php");
include("../../../PHP/Fechas.php"); 
include("ComprovaStock.php");

session_start();

$idPetAnimProd = $_POST["id"];
$error = 0;

$SQL = "SELECT * FROM PetAnimProdSub WHERE IdPetAnimProd =".$idPetAnimProd;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$valor = $row["Mascles"]."|".$row["Femelles"];
	$idPetAnimProdSub = $row["IdPetAnimProdSub"];
}

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
			$error = CanviaElementsStock($row["IdProcediment"],$IdProc,$row["IdSoca"],$row["IdComandaCap"],$sexo[$i],$c[$i],$row["FechaNac"]);
			//echo $error.", ";
	}
}

if ($error == 0)
{
	$SQL3 = "Delete FROM PetAnimProdSub where IdPetAnimProdSub = ".$idPetAnimProdSub;
	$result3 = mysql_query($SQL3,$oConn);
	

	$SQL = "UPDATE PetAnimProd SET Estado = 2 where IdPetAnimProd = ".$idPetAnimProd;
	$result = mysql_query($SQL,$oConn);

}

echo $error."|".$IdCC;
?>