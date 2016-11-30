<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
include("Procediment.php"); 
include("Centre.php"); 
include("Observacions.php"); 
session_start();

////,aux:aux,:NomCentre,:DirCentre,:PaisCentre,:PersCentre,:TelCentre,:EmailCentre

//$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
//$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];

$Obs = $_POST["Obs"];

$aux = $_POST["aux"];
$NomCentre = Pon($_POST["NomCentre"]);
$DirCentre = Pon($_POST["DirCentre"]);
$PaisCentre = Pon($_POST["PaisCentre"]);
$PersCentre = Pon($_POST["PersCentre"]);
$TelCentre = Pon($_POST["TelCentre"]);
$EmailCentre = Pon($_POST["EmailCentre"]);
$NReg = Pon($_POST["NReg"]);

$IdCC = ComandaCap(10,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);

if ($Obs) Observacions($IdCC,$Obs);

GuardaCentre($IdCC,$NomCentre,$DirCentre,$PaisCentre,$PersCentre,$TelCentre,$EmailCentre,$NReg);

$cadena = "";
$v = "";

$v = explode("#",$aux);

for ($i=1; $i<count($v); $i++)
{
	$cadena = explode("|",$v[$i]);

	$SQL = "INSERT INTO Expo(IdComandaCap, IdEspecie, Soca, Genotip, Marcatge, Iden, sala, Sexo, Cant, FechaNac)   
			VALUES ($IdCC, ".$cadena[0].", '".$cadena[1]."', '".$cadena[2]."', '".$cadena[3]."', '".$cadena[4]."', '".$cadena[5]."', ".$cadena[6].", ".$cadena[7].", '".InsertFecha($cadena[8])."')";
	$result = mysql_query($SQL,$oConn);
}

$mensaje = '
	<p>N&uacute;mero de comanda:'.$IdCC.'</p>
	<p>Podeu accedir a partir del seg&uuml;ent <a href="https://estabulari.uab.cat/admin">enllaç</a> </p>';

$asunto = 'Nova petició d\'exportació al SE:'.$IdCC;

//$desti="rafael.alarcon@uab.cat";
$desti = "se.suport.veterinari@uab.cat";

//$sheader="From:importacions@estabulari.uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
$sheader="From:exportacions@estabulari.uab.cat \nReply-To:se.suport.veterinari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);

$desti = "s.estabulari@uab.cat";

$sheader="From:exportacions@estabulari.uab.cat \nReply-To:s.estabulari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);


///////////////////////////////////////////
//echo $SQL . "%%$%%$%" . $_SESSION["IdUser"];
echo "Petició enviada";
?>