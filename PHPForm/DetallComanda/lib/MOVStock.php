<?php
function MOVStockGuarda($idSoca, $NSM, $NSH,$FechaMOV,$TipusMOV,$IdProc,$DN,$IdCC, $cria){
	
	session_start();	
	include("../../../rao/EstabulariForm_con.php");

	if ($cria) $validado = 1;
	else $validado = ComprovaUnitatsPreMOV($idSoca, $TipusMOV, $NSM, $NSH, $IdProc, $DN);
	
	if ($validado == 1)
	{	
		$SQL = " INSERT INTO AnimalMOVCap(IdSoca, UniMas, UniFam, Fecha, TipusMOV, IdProcediment, IdUser,FechaNacimiento, IdComandaCap)VALUES($idSoca, $NSM, $NSH,'$FechaMOV',$TipusMOV,$IdProc,".$_SESSION["IdUser"].",'$DN',$IdCC)";
		
		$result = mysql_query($SQL,$oConn);
	}
	
//		echo "Validado:".$validado.", SQL:".$SQL."<br>";
	
	return $validado;

}


function MOVStockElimina($idSoca, $NSM, $NSH,$TipusMOV,$IdProc,$DN,$IdCC){
	
	session_start();
	include("../../../rao/EstabulariForm_con.php");

	$SQL = "	
		DELETE FROM AnimalMOVCap  
		WHERE IdComandaCap = ".$IdCC."       
		 AND IdProcediment = ".$IdProc." 
		 AND IdSoca = ".$idSoca." 
		 AND FechaNacimiento = '".$DN."'  
		 AND UniMas = ".$NSM." 
		 AND UniFam = ".$NSH." 
		 AND TipusMOV = ".$TipusMOV." 
		
		 LIMIT 1 "; // Por si hay dos lineas con el mismo número de animales

	$result = mysql_query($SQL,$oConn);
	//echo "SQL2:".$SQL."<br>";
	
	//echo $validado;

}


function ComprovaUnitatsPreMOV($id, $RT, $NSM, $NSH, $NProc, $DN)
{
	switch ($RT)
	{
		case "1":
		case "2":
		case "3":   return 1;
					break;
		case "4":	
		case "5":	
		case "6":
		case "8":
		case "10":
		case "11":
		case "9":	/////Comprovem que existeixen les unitats a l'inventari
					$mensaje = "No hi han prou unitats de mascles o femelles per tal de realitzar aquest moviment";
					$res = 0;
					break; 
		case "7":	/////Comprovem que hi han prou unitats reservades per a alliberar
					$mensaje = "No hi han prou unitats de mascles o femelles reservades per tal de realitzar aquest moviment";
					$res = 1;
					break;		
	}
	
    $data = ComprovaStock($id, $NProc, $DN, $res);
	//echo "</br>data:".$data;
	$unitats = explode("|",$data);
	
	//echo "(".$NSM.">".$unitats[0]."||".$NSH.">".$unitats[1].")";
	if(($NSM>$unitats[0])||($NSH>$unitats[1])) return $mensaje;
	else return 1;	
}
?>