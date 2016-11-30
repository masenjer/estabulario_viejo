<?php
include("../../../rao/EstabulariForm_con.php");
include("CanviaElementsStock.php");
include("../../../PHP/Fechas.php"); 
include("ComprovaStock.php");
include("AlliberaStock.php");
include("MOVStock.php");

session_start();

$id = $_POST["id"];			//IdPetAnimProd
$IdProc = $_POST["IdProc"]; //De ComandaCap
$EF = $_POST["val"];		//Estado futuro
$EA = $_POST["EA"];			//Estado Anterior

$hoy = date("Y-m-d");

/*********************************************************************************************************\
***********************************************************************************************************
**																										 **
**			CASOS																						 **
**																										 **
**				1. En Curso -> Aceptado		2. En Curso -> Denegado										 **
**				3. Denegado -> Aceptado		4. Aceptado -> Denegado										 **
**																										 **
**																										 **
**			VALORES DE ESTADO																			 **
**																										 **
**				0 -> En Curso 		1 -> Aceptado		2 -> Denegado									 **
**																										 **
**																										 **
**			TIPOS DE MOVIMIENTO																			 **
**																										 **
**				1 -> Inventari		2-> Naixement 		3-> Compra			4-> Mort					 **
**				5 -> Venda			6-> Reserva 		7-> Allibera		8-> Excedent				 **
**				9 -> Sexat			10-> Recollida		11-> Utilització								 **
**																										 **
***********************************************************************************************************
\*********************************************************************************************************/


$SQL = "	SELECT PA.IdProcediment, PA.IdComandaCap, PA.Cantidad, PA.Sexo, PA.FechaNac, PA.IdSoca, R.Fecha, R.Tipus, PA.Crias  
			FROM PetAnimProd PA
			INNER JOIN Recollida R
			ON R.IdComandaCap = PA.IdComandaCap  
			WHERE PA.IdPetAnimProd = ".$id;

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result)){
	
	$IdCC = $row["IdComandaCap"];
	
	if ($row["FechaNac"]==NULL || $row["FechaNac"]== '0000-00-00' || $row["FechaNac"] == ""){
	
	echo "No es pot tramitar la línia sense donar-li una data de naixement als animals que s'han de servir"."|".$IdCC;
	
	return false;		
}
	

		
	if ($row["Tipus"]==0)$TR = 10; // Recollida
	else $TR = 11; // Utilització
	
	$UniMas = 0;
	$UniFam = 0;

	if ($row["Sexo"] == "M") $UniMas = $row["Cantidad"];
	else $UniFam = $row["Cantidad"];

	
	if ($EF == 2){ // Casos 2 y 4 -> Elimina todos los movimientos creados en stock
		if ($IdProc != $row["IdProcediment"]){ // Hay movimientos entre stocks. Elimina movimientos			
			// Elimina el movimiento de venta en el stock inicial del IdProc de linea
			MOVStockElimina($row["IdSoca"],$UniMas,$UniFam,5,$row["IdProcediment"],$row["FechaNac"],$IdCC);
			// Elimina el movimiento de compra en el stock final del IdProc ComandaCap
			MOVStockElimina($row["IdSoca"],$UniMas,$UniFam,3,$IdProc,$row["FechaNac"],$IdCC);
		}
		// Elimina el movimiento de reserva de en el stock del pedido
			MOVStockElimina($row["IdSoca"],$UniMas,$UniFam,6,$IdProc,$row["FechaNac"],$IdCC);
		
		if ($EA == 1){ // Caso 4. Elimino el movimiento de utilización o recogida 		
			MOVStockElimina($row["IdSoca"],$UniMas,$UniFam, $TR,$IdProc,$row["FechaNac"],$IdCC);
		}
	}
	//Casos 1 y 3
	else{ // EF ha de ser 1 -> Aceptado porque no se puede volver nunca a "en curso".
		if($EA == 2){ // Viene del denegado, hay que crear todos los movimientos
			// Creo el movimiento de venta en el stock inicial del IProd de la linea
			MOVStockGuarda($row["IdSoca"],$UniMas,$UniFam,$hoy,5,$row["IdProcediment"],$row["FechaNac"],$IdCC,$row["Crias"]);	
			// Creo el movimiento de compra en el stock final del IdProc ComandaCap
			MOVStockGuarda($row["IdSoca"],$UniMas,$UniFam,$hoy,3,$IdProc,$row["FechaNac"],$IdCC,$row["Crias"]);
		}else{ //Caso 1, hay que eliminar el movimiento de reserva en el NProc de comanda.
			MOVStockElimina($row["IdSoca"],$UniMas,$UniFam,6,$IdProc,$row["FechaNac"],$IdCC);
		}
		//Crea el movimiento de utilización o recogida
		MOVStockGuarda($row["IdSoca"],$UniMas,$UniFam, $row["Fecha"], $TR,$IdProc,$row["FechaNac"],$IdCC,$row["Crias"]);
	}
}

	$SQL = "UPDATE PetAnimProd SET Estado = ".$EF." where IdPetAnimProd = ".$id;
	$result = mysql_query($SQL,$oConn);

if ($error == 1) $error = "No hi ha suficient estoc per fer el moviment";

echo $error."|".$IdCC;
//echo $SQL;
?>