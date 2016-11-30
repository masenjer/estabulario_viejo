<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("Observacions.php"); 
include("DadesEcon.php"); 
session_start();

$P = $_POST["P"];
$C = $_POST["C"];
$F = $_POST["F"];
$I = $_POST["I"];
$CE = $_POST["CE"];

$Obs = $_POST["Obs"];

$IdCC = ComandaCap(12,"","");
if ($Obs) Observacions($IdCC,$Obs);
//DadesEcon($IdCC,"", "", "");

$SQL = "INSERT INTO Paqueteria(IdComandaCap, Proveidor, Concepte, Fecha, Identificacio, Condicions)   
		VALUES ($IdCC, '$P', '$C', '".InsertFecha($F)."', '$I',$CE)";
	$result = mysql_query($SQL,$oConn);

$mensaje = '
	<p>N&uacute;mero de comanada:'.$IdCC.'</p>
	<p>Podeu accedir a partir del seg&uuml;ent <a href="https://estabulari.uab.cat/admin">enllaç</a> </p>';

$asunto = 'Avís d\'arribada de paqueteria: '.$IdCC;

//$desti="rafael.alarcon@uab.cat";

$desti = "s.estabulari@uab.cat";

$sheader="From:Paqueteria@estabulari.uab.cat \nReply-To:s.estabulari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);


	
echo $SQL;//"Comanda cursada correctament";
?>