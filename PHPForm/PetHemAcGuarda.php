<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
include("Procediment.php"); 
include("Recollida.php"); 
include("Observacions.php"); 

//$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
//$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];
$FR = $_POST["FR"];
$HR = $_POST["HR"];
$VM = $_POST["VM"];
$SAC = $_POST["Sacrifici"];
//$LR = $_POST["LR"];
$aux = $_POST["aux"];

$Obs = $_POST["Obs"];

$IdCC = ComandaCap(2,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
Recollida($IdCC,$FR,$HR,0,$VM,$SAC);
//FrangHor($IdCC,$Horari);

session_start();

/////////////////////////////// PetAnimProd

	$cadena = explode("|",$aux);
	
	for ($i=0;$i<$cadena[0];$i++)
	{
		$z = $i*4;
		
		$SQL = "INSERT INTO PetHemAc(IdComandaCap, IdSoca, Cantidad, Fecha,  Estado, IdUser, CT) VALUES ($IdCC,".$cadena[$z+2].",".$cadena[$z+3].",'".InsertFecha($cadena[$z+4])."',0,". $_SESSION["IdUser"].",0)";
		$result = mysql_query($SQL,$oConn);
	}


///////////////////////////////////////////
echo "Resgistro guardado!";
?>