<?php
include("../../../rao/EstabulariForm_con.php");
include("CanviaElementsStock.php");
include("../../../PHP/Fechas.php"); 
include("ComprovaStock.php");
include("AlliberaStock.php");

session_start();

$id = $_POST["id"];
$IdProc = $_POST["IdProc"];
$val = $_POST["val"];
$EA = $_POST["EA"];



$SQL = "SELECT IdProcediment, IdComandaCap, Cantidad, Sexo, FechaNac, IdSoca FROM PetAnimProd WHERE IdPetAnimProd = ".$id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$IdCC = $row["IdComandaCap"];
	
	//echo "(((".$row["IdProcediment"]."!=".$IdProc.")))";
	//echo "(((".$EA."!=".$val.")))";
	
	//echo ("(EA:".$EA.",val:".$val.")");
//	if ($row["IdProcediment"]!= $IdProc)///Controla que el NProc no sigui el mateix als dos (nou i antic)
//	{
		////Crea el moviment de reserva a stock amb numero de albarà
		if ($EA == 0)
		{
			if ($val == 1)
			{
				//echo '""""1""""';
				//echo "####".$row["IdProcediment"].",".$row["IdSoca"].",".$row["IdComandaCap"].",".$row["Sexo"].",".$row["Cantidad"].",".$row["FechaNac"]."####";
				$error = AlliberaStock($row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);//($IdProc,$IdSoca,$IdCC,$S,$C,$DN);
				
				//echo "error:".$error."|||||";
				
				if ($error == 0)$error = CanviaElementsStock($IdProc,$row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);
			}
			if ($val == 2)
			{
				//echo "entra";
				$error = AlliberaStock($row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);//($IdProc,$IdSoca,$IdCC,$S,$C,$DN);
			}
		}else
		{
			if ($EA == 1)
			{
				//echo '""""2""""';
				$error = CanviaElementsStock($row["IdProcediment"],$IdProc,$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);
			}
			else
			{
				if ($EA == 2 && $val==1)
				{
					//echo '""""3""""';
					$error = CanviaElementsStock($IdProc,$row["IdProcediment"],$row["IdSoca"],$row["IdComandaCap"],$row["Sexo"],$row["Cantidad"],$row["FechaNac"]);
				}else $error = 0;
			}	
		}
	}
//}

if ($error == 0)
{
	$SQL = "UPDATE PetAnimProd SET Estado = ".$val." where IdPetAnimProd = ".$id;
	$result = mysql_query($SQL,$oConn);
}

echo $error."|".$IdCC;
//echo $SQL;
?>