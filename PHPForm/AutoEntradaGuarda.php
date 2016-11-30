<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php");
include("Observacions.php"); 
include("ContacteAltresAnimals.php");

/////:Nom,:NIF,:Tel,:Email,AC:,:CE,:Area,:OZ,:Motiu,:CA,:Horari

$Nom = Pon($_POST["Nom"]);
$NIF = $_POST["NIF"];
$Tel = $_POST["Tel"];
$Email = $_POST["Email"];
$AC = $_POST["AC"];
$CE = $_POST["CE"];
$Area = $_POST["Area"];
$OZ = $_POST["OZ"];
$Motiu = Pon($_POST["Motiu"]);
$CA = $_POST["CA"];
$Horari = $_POST["Horari"];

$Obs = $_POST["Obs"];

$IdCC= ComandaCap(15,"","");
if ($Obs) Observacions($IdCC,$Obs);
ContacteAltresAnimals($IdCC,$CA);

/////////////////////////////// AccesEstabulari
$SQL = "INSERT INTO AccesEstabulari(IdComandaCap, Nom, NIF, Tel, Email, Centro, Acreditacion, Areas, OtrasZonas, Motivo ) VALUES ($IdCC,'$Nom','$NIF','$Tel','$Email','$CE','$AC','$Area','$OZ','$Motiu')";
$result = mysql_query($SQL,$oConn);
///////////////////////////////////////////
echo $SQL;


$mensaje = '
	<p>N&uacute;mero de comanda:'.$IdCC.'</p>
	<p>Podeu accedir a partir del seg&uuml;ent <a href="https://estabulari.uab.cat/admin">enllaç</a> </p>';

$asunto = 'Nova petició d\'utorització d\'entrada d\'usuaris al SE: '.$IdCC;

//$desti="rafael.alarcon@uab.cat";
$desti = "se.suport.veterinari@uab.cat";

//$sheader="From:importacions@estabulari.uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
$sheader="From:AutoritzacioEntrada@estabulari.uab.cat \nReply-To:se.suport.veterinari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);

$desti = "s.estabulari@uab.cat";

$sheader="From:AutoritzacioEntrada@estabulari.uab.cat \nReply-To:s.estabulari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

//mail($desti,$asunto,$mensaje,$sheader);

echo "Resgistro guardado!";
?>