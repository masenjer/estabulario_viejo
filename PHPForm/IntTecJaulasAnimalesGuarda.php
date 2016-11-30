<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
//include("Procediment.php"); 
include("Recollida.php"); 
include("Devolucio.php"); 
include("Observacions.php"); 

session_start();

//NumProc:NumProc,Resp:Resp,CC:CC,RC:RC,aux1:aux1,aux2:aux2,FR:FR,HR:HR,FD:FD,HD:HD

//$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
//$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];
$FR = $_POST["FR"];
$HR = $_POST["HR"];
$VM = $_POST["VM"];
$SAC = $_POST["Sacrifici"];

$FD = $_POST["FD"];
$HD = $_POST["HD"];
$aux1 = $_POST["aux1"];
$aux2 = $_POST["aux2"];

$Obs = $_POST["Obs"];

$IdCC = ComandaCap(8,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
Recollida($IdCC,$FR,$HR,0,$VM,$SAC);
if ($FD) Devolucio($IdCC,$FD,$HD,0);


$v = explode("#",$aux1);

for ($i=1; $i<count($v); $i++)
{
	$cadena = explode("|",$v[$i]);

	$SQL = "INSERT INTO JaulasAnimLin(IdComandaCap, IdSoca, RatonID, Cantidad, IdUser, CT)   
			VALUES ($IdCC, ".$cadena[1].", '".$cadena[2]."', ".$cadena[3].",". $_SESSION["IdUser"].",0)";
	$result = mysql_query($SQL,$oConn);
	
	//echo $SQL;
}

$cadena = "";
$v = "";

$v = explode("#",$aux2);

for ($i=1; $i<count($v); $i++)
{
	$cadena = explode("|",$v[$i]);

	$SQL = "INSERT INTO JaulasJaulaLin(IdComandaCap, IdSoca, Sala, Posicion, NumJaula, IdUser, CT)   
			VALUES ($IdCC, ".$cadena[1].", '".$cadena[2]."', '".$cadena[3]."', '".$cadena[4]."',". $_SESSION["IdUser"].",0)";
	$result = mysql_query($SQL,$oConn);
}


///////////////////////////////////////////
//echo $SQL . "%%$%%$%" . $_SESSION["IdUser"];
echo "Resgistro guardado!";
?>