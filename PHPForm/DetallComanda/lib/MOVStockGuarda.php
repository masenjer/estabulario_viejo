<?php
function MOVStockGuarda($idSoca, $NSM, $NSH,$FechaMOV,$TipusMOV,$IdProc,$DN,$IdCC,$Albaran, $Reserva){
	
	session_start();	
	include("../../../rao/EstabulariForm_con.php");

	$validado = ComprovaUnitatsPreMOV($idSoca, $TipusMOV, $NSM, $NSH, $idSoca, $DN);
	
	if ($validado == 1)
	{	
		$SQL = " INSERT INTO AnimalMOVCap(IdSoca, UniMas, UniFam, Fecha, TipusMOV, IdProcediment, IdUser,FechaNacimiento, IdComandaCap, NAlbaran, Reservat)VALUES($idSoca, $NSM, $NSH,'$FechaMOV',$TipusMOV,$IdProc,".$_SESSION["IdA"].",'$DN',$IdCC,'$Albaran', $Reserva)";
		
		$result = mysql_query($SQL,$oConn);
	}
	
	echo $validado;

}


function MOVStockElimina($idSoca, $NSM, $NSH,$FechaMOV,$TipusMOV,$IdProc,$DN,$IdCC,$Albaran, $Reserva){
	
	session_start();
	include("../../../rao/EstabulariForm_con.php");

	$validado = ComprovaUnitatsPreMOV($idSoca, $TipusMOV, $NSM, $NSH, $idSoca, $DN);
	
	if ($validado == 1)
	{
		$SQL = "	
			DELETE AnimalMOVCap 
			WHERE
				IdComandaCap = ".$IdCC."
			AND	IdProcediment = ".$IdProc."
			AND IdSoca = ".$idSoca."
			AND FechaNacimiento = '".$DN."' 
			AND UniMas = ".$NSM."
			AND UniFam = ".$NSH."
			AND TipusMOV = ".$TipusMOV."
			
			LIMIT 1 "; // Por si hay dos lineas con el mismo número de animales

		$result = mysql_query($SQL,$oConn);
	}
	
	echo $validado;

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
	
	$unitats = explode("|",$data);
	
	if(($NSM>$unitats[0])||($NSH>$unitats[1])) return $mensaje;
	else return 1;	
}
?>