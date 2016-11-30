<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
include("Procediment.php"); 
include("Recollida.php"); 
include("Observacions.php"); 

$CC = $_POST["CC"];
$NProc = $_POST["NumProc"];
$FR = $_POST["FR"];
$HR = $_POST["HR"];
$LR = $_POST["LR"];
$VM = $_POST["VM"];
$SAC = $_POST["Sacrifici"];

$aux = $_POST["aux"];

$Obs = $_POST["Obs"];

$IdCC = ComandaCap(3,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
Recollida($IdCC,$FR,$HR,$LR,$VM,$SAC);

session_start();

/////////////////////////////// PetAnimProd
	$cadena = explode("|",$aux);
	
	for ($i=0;$i<$cadena[0];$i++)
	{
		$z = $i*9;
		
		$cantM = ($cadena[$z+4]== "") ? "0" : $cadena[$z+4];
		$edatM = ($cadena[$z+5]== "") ? "0" : $cadena[$z+5];
	
		$cantF = ($cadena[$z+7]== "") ? "0" : $cadena[$z+7];
		$edatF = ($cadena[$z+8]== "") ? "0" : $cadena[$z+8];
		
		$SQL = "INSERT INTO CompraAnim(IdComandaCap, IdSoca, IdProv, CantidadM, EM, EUM, CantidadF, EF, EUF, Estado ,IdUser, CT) VALUES ($IdCC,".$cadena[$z+2].",".$cadena[$z+3].",".$cantM.",".$edatM.",".$cadena[$z+6].",".$cantF.",".$edatF.",".$cadena[$z+9].",0,". $_SESSION["IdUser"].",0)";
		$result = mysql_query($SQL,$oConn);
	}

///////////////////////////////////////////
echo "Resgistre guardat";
?>