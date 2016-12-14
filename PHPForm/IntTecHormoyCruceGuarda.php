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

$EsH = $_POST["EsH"];
$CeH = $_POST["CeH"];
$EsM = $_POST["EsM"];
$CeM = $_POST["CeM"];
$VH1 = $_POST["VH1"];
$FH1 = $_POST["FH1"];
$HH1 = $_POST["HH1"];
$EH = $_POST["EH"];
$SGH = $_POST["SGH"];
$CaH = $_POST["CaH"];
$VH2 = $_POST["VH2"];
$FH2 = $_POST["FH2"];
$HH2 = $_POST["HH2"];
$EM = $_POST["EM"];
$SGM = $_POST["SGM"];
$FC = $_POST["FC"];
$HC = $_POST["HC"];
$T = $_POST["T"];
$FTD = $_POST["FTD"];
$FTH = $_POST["FTH"];
$S = $_POST["S"];
$FS = $_POST["FS"];
$CHM = $_POST["CHM"];
$rV = $_POST["rV"];
$SAC = $_POST["Sacrifici"];

$Obs =  $_POST["Obs"];

if ($FH1 != "") $FH1 = "'".InsertFecha($FH1)."'";
else $FH1 = "NULL";

if ($FH2 != "") $FH2 = "'".InsertFecha($FH2)."'";
else $FH2 = "NULL";

if ($FC != "") $FC = "'".InsertFecha($FC)."'";
else $FC = "NULL";

if ($FTD != "") $FTD = InsertFecha($FTD);
else $FTD = "NULL";

if ($FTH != "") $FTH = InsertFecha($FTH);
else $FTH = "NULL";

if ($FS != "") $FS = InsertFecha($FS);
else $FS = "NULL";


$IdCC = ComandaCap(6,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
Recollida($IdCC,$FR,$HR,$LR,$VM, $SAC);
if ($FTD) MTV($IdCC,$FTD, $FTH);
if ($FS) Separar($IdCC,$FS);

/////////////////////////////// HormoyCruces

$SQL = "INSERT INTO HormoyCruces(IdComandaCap, IdSocaF, EF, EUF, CF, IdSocaM, EM, EUM, CM, V, VH1, FH1, HH1, VH2, FH2, HH2, FC, HC) VALUES ($IdCC,$CeH, $EH, $SGH, $CaH, $CeM, $EM, $SGM, $CHM, $rV, '$VH1', ".$FH1.", '".$HH1."', '$VH2', ".$FH2.", '".$HH2."', ".$FC.", '".$HC."')";
$result = mysql_query($SQL,$oConn);


///////////////////////////////////////////
//echo $SQL . "%%$%%$%" . $_SESSION["IdUser"];
//echo "Resgistro guardado!";
?>