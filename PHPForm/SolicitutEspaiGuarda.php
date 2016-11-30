<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
include("Procediment.php"); 
include("Procedencia.php"); 
include("Observacions.php"); 
session_start();

////:Procedencia,:FechaLlegada

$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];

$Obs = $_POST["Obs"];

$aux = $_POST["aux"];

$Procedencia = $_POST["Procedencia"];
$FechaLlegada = $_POST["FechaLlegada"];

$IdCC = ComandaCap(11,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
Procedencia($IdCC,$FechaLlegada,$Procedencia);

$cadena = "";
$v = "";

$v = explode("#",$aux);

for ($i=1; $i<count($v); $i++)
{
	$cadena = explode("|",$v[$i]);
	//$a = $i*7;
	$SQL = "INSERT INTO EspaiAnimals(IdComandaCap, IdSoca, Sexo, Cant, EP, UEP, AJ, IdUser, CT)   
			VALUES ($IdCC, ".$cadena[1].", ".$cadena[2].", ".$cadena[3].", ".$cadena[4].", ".$cadena[5].", ".$cadena[6].",".$_SESSION["IdUser"].",0)";
	$result = mysql_query($SQL,$oConn);
	
	//echo $SQL;
}

$mensaje = '
	<p>N&uacute;mero de comanda:'.$IdCC.'</p>
	<p>Podeu accedir a partir del seg&uuml;ent <a href="https://estabulari.uab.cat/admin">enllaç</a> </p>';

$asunto = 'Nova petició de sol·licitud d\'espai per a allotjament d\'animals: '.$IdCC;

//$desti="rafael.alarcon@uab.cat";
$desti = "se.suport.veterinari@uab.cat";

//$sheader="From:importacions@estabulari.uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
$sheader="From:SolicitutEspai@estabulari.uab.cat \nReply-To:se.suport.veterinari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);

$desti = "s.estabulari@uab.cat";

$sheader="From:SolicitutEspai@estabulari.uab.cat \nReply-To:s.estabulari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);



///////////////////////////////////////////
//echo $SQL . "%%$%%$%" . $_SESSION["IdUser"];
echo "Comanda enviada correctament";
?>