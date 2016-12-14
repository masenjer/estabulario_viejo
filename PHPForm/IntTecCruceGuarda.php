<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
//include("Procediment.php"); 
include("Recollida.php"); 
include("Observacions.php"); 
include("MTV.php"); 
include("Separar.php"); 

session_start();

//$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
//$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];
$FR = $_POST["FR"];
$HR = $_POST["HR"];
$LR = $_POST["LR"];
$VM = $_POST["VM"];
$SAC = $_POST["Sacrifici"];

$EsH = $_POST["EsH"];
$CeH = $_POST["CeH"];
$EsM = $_POST["EsM"];
$CeM = $_POST["CeM"];
$EH = $_POST["EH"];
$SGH = $_POST["SGH"];
//$CaH = $_POST["CaH"];
$EM = $_POST["EM"];
$SGM = $_POST["SGM"];
$FC = $_POST["FC"];
$HC = $_POST["HC"];
$T = $_POST["T"];
$FTD = $_POST["FTD"];
$FTH = $_POST["FTH"];
$S = $_POST["S"];
$FS = $_POST["FS"];
//$CHM = $_POST["CHM"];
$rV = $_POST["rV"];
$aux = $_POST["aux"];

$Obs = $_POST["Obs"];

if ($FTD != "") $FTD = InsertFecha($FTD);
else $FTD = "NULL";

if ($FTH != "") $FTH = InsertFecha($FTH);
else $FTH = "NULL";

if ($FS != "") $FS = InsertFecha($FS);
else $FS = "NULL";

$IdCC = ComandaCap(7,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
if ($FR) Recollida($IdCC,$FR,$HR,$LR,$VM,$SAC);
if ($FTD) MTV($IdCC,$FTD, $FTH);
if ($FS) Separar($IdCC,$FS);

/////////////////////////////// CrucesCap

$SQL = "INSERT INTO CrucesCap(IdComandaCap, IdSocaF, EF, EUF, IdSocaM, EM, EUM, V) VALUES ($IdCC, $CeH, $EH, $SGH, $CeM, $EM, $SGM,  $rV)";
$result = mysql_query($SQL,$oConn);


//echo $SQL;
/////////////////////////////// CrucesLin

$SQL = " SELECT IdCrucesCap from CrucesCap Order by IdCrucesCap Desc Limit 1";
$result = mysql_query($SQL,$oConn);
while ($row = mysql_fetch_array($result))
{
	$IdCrucesCap = $row["IdCrucesCap"];
}

$v = explode("#",$aux);

//$N = $v[0];

for ($i=1; $i<count($v); $i++)
{
	$cadena = explode("|",$v[$i]);

	//$a = $i*5;
	$SQL = "INSERT INTO CrucesLin(IdCrucesCap, IdSocaM, IdSocaF1, IdSocaF2, IdSocaF3, FC, HC)   
			VALUES ($IdCrucesCap, '".$cadena[0]."', '".$cadena[1]."', '".$cadena[2]."', '".$cadena[3]."', '".InsertFecha($cadena[4])."', '".$cadena[5]."')";
	$result = mysql_query($SQL,$oConn);
	
	//echo "///////SQL".$i.": ".$SQL;

}

?>