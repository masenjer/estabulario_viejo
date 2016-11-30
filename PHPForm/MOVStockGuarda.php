<?php
include("../rao/EstabulariForm_con.php");
include("../PHP/Fechas.php"); 
include("ComprovaStock.php"); 
session_start();

////:DN,:C,:NProc,:Com,:A

$id = $_GET["id"];
$RT = $_GET["RT"];
$NSM = $_GET["NSM"];
$NSH = $_GET["NSH"];
$DN = InsertFecha($_GET["DN"]);
$C = $_GET["C"];
$NProc = $_GET["NProc"];
$Com = $_GET["Com"];
$A = $_GET["A"];
$hoy = date("Y-m-d");

if (!$NSH) $NSH = 0; 
if (!$NSM) $NSM = 0; 

if (!$NProc) $NProc = 12;
if (!$Com) $Com=0;

if ($RT == 6) $R=1;
else $R = 0;

$C=0;


$validado = ComprovaUnitatsPreMOV($id, $RT, $NSM, $NSH, $NProc, $DN);

if ($validado == 1)
{	
	$SQL = " INSERT INTO AnimalMOVCap(IdSoca, UniMas, UniFam, Fecha, TipusMOV, IdProcediment, IdUser,FechaNacimiento, IdComandaCap, NAlbaran, Reservat)VALUES($id, $NSM, $NSH,'$hoy',$RT,$NProc,".$_SESSION["IdA"].",'$DN',$Com,'$A', $R)";
	$result = mysql_query($SQL,$oConn);
}

echo $validado . "|". $DN;








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
	
    $data=ComprovaStock($id, $NProc, $DN, $res);
	
	//return $data;
	$unitats = explode("|",$data);
	
	//echo "(".$NSM.">".$unitats[0].")||(".$NSH.">".$unitats[1].")";
	
	if(($NSM>$unitats[0])||($NSH>$unitats[1])) return $mensaje;
	else return 1;	
   
//    if ((ComprovaStock($id, $NProc, $DN, $res, $NSM, $NSH))== 1)
//	{
//		return 1;	
//	}
//	else
//	{ 
//		return $mensaje;
//	}
}

//function ComprovaStock($id, $NProc, $DN, $res, $NSM, $NSH)
?>