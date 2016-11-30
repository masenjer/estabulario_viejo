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
$aux = $_POST["aux"];
$f = $_POST["f"];

session_start();

switch ($f)
{
	case "4":	$t = array("1","2","3");
							break;	

	case "5":	$t = array("4","5","6");
				//$NProc = "19";
							break;	
}


$Obs = $_POST["Obs"];

if ($NProc) $IdCC = ComandaCap($f,$NProc,$CC);
else $IdCC = ComandaCap($f,"",$CC);

if ($Obs) Observacions($IdCC,$Obs);
//DadesEcon($IdCC,$Resp, $CC, $RC);

/////////////////////////////// PetAnimProd
	
	$v = explode("#",$aux);
	
	for ($j=0;$j<3;$j++)
	{
		$cadena = explode("|",$v[$j]);
	
		for ($i=0;$i<$cadena[0];$i++)
		{
			$z = $i*3;
			
			$SQL = "INSERT INTO ActiuMOV(IdComandaCap, IdActiu, Unitats, Fecha, Tipus,IdUser,CT) VALUES ($IdCC,".$cadena[$z+1].",".$cadena[$z+2].",'".InsertFecha($cadena[$z+3])."',".$t[$j].",".$_SESSION["IdUser"].",0)";
			$result = mysql_query($SQL,$oConn);
			
			//echo $SQL;
		}
	}

///////////////////////////////////////////
echo "Resgistro guardado!";
?>