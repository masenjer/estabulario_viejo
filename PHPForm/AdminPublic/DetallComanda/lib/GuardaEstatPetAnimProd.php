<?php
include("../../../rao/EstabulariForm_con.php");
include("CanviaElementsStock.php");
include("../../../PHP/Fechas.php"); 
include("ComprovaStock.php");

session_start();

$id = $_POST["id"];
$IdProc = $_POST["IdProc"];
$val = $_POST["val"];
$EA = $_POST["EA"];

echo "entro";



$SQL = "SELECT IdProcediment, IdComandaCap, Cantidad, Sexo, FechaNac, IdSoca FROM PetAnimProd WHERE IdPetAnimProd = ".$id;
echo $SQL;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$IdCC = $row["IdComandaCap"];
	
	//echo "(((".$row["IdProcediment"]."!=".$IdProc.")))";
	
	if ($row["IdProcediment"]!= $IdProc)
	{
		////Crea el moviment de reserva a stock amb numero de albarà
		if ($EA == 0 && $val==1)
		{
			$error = CanviaElementsStock($IdProc,$row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);
		}else
		{
			if ($EA == 1)
			{
				$error = CanviaElementsStock($row["IdProcediment"],$IdProc,$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);
			}
			else
			{
				if ($EA == 2 && $val==1)
				{
					$error = CanviaElementsStock($IdProc,$row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);
				}else $error = 0;
			}	
		}
	}
}

if ($error == 0)
{
	$SQL = "UPDATE PetAnimProd SET Estado = ".$val." where IdPetAnimProd = ".$id;
	$result = mysql_query($SQL,$oConn);
}

echo $error."|".$IdCC;
//echo $SQL;
?>