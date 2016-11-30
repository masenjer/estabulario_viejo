<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
include("Procediment.php"); 
include("FrangHor.php"); 
include("Observacions.php"); 

$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];
$Horari = $_POST["Horari"];
$Eq1 = $_POST["Eq1"];

$Obs = $_POST["Obs"];

$IdCC= ComandaCap(0,$NProc,$CC); 
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
//Procediment($IdCC,$NIUInves,$Inves, $NProc, $NOrden);
FrangHor($IdCC,$Horari);
/////////////////////////////// ReservaEspai
$SQL = "INSERT INTO ReservaEspai(IdComandaCap, Equips) VALUES ($IdCC,$Eq1)";
$result = mysql_query($SQL,$oConn);
///////////////////////////////////////////
echo 1;
?>