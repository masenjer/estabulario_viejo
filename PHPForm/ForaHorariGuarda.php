<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php");
include("FrangHor.php"); 
include("Observacions.php"); 

/////:Nom,:NIF,:Tel,:Email,AC:,:CE,:Area,:OZ,:Motiu,:CA,:Horari

$PH = $_POST["PH"];
$Horari = $_POST["Horari"];

$Obs = $_POST["Obs"];

$IdCC= ComandaCap(14,"","");
if ($Obs) Observacions($IdCC,$Obs);
FrangHor($IdCC,$Horari);

////////Contacte amb altres animals
/////Se ha de recorrer 5 veces el $CA

$cadena = explode("#",$PH);


for ($i=0;$i<count($cadena);$i++)
{
	$c = explode("|",$cadena[$i]);
		
	$SQL = "INSERT INTO UsuariFH(IdComandaCap, Nom, Cognoms, NIF) VALUES ($IdCC,'$c[0]','$c[1]','$c[2]')"; 		
	$result = mysql_query($SQL,$oConn);
	
}

$mensaje = '
	<p>N&uacute;mero de comanada:'.$IdCC.'</p>
	<p>Podeu accedir a partir del seg&uuml;ent <a href="https://estabulari.uab.cat/admin">enllaç</a> </p>';

$asunto = 'Nova petició d\'accés al SE fora d\'horari: '.$IdCC;

//$desti="rafael.alarcon@uab.cat";
$destiCruz = "s.estabulari@uab.cat";
$destiPedro = "pedrojose.otaegui@uab.cat";

$sheader="From:ForaHorari@estabulari.uab.cat \nReply-To:s.estabulari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($destiCruz,$asunto,$mensaje,$sheader);
mail($destiPedro,$asunto,$mensaje,$sheader);



echo "Resgistro guardado!";
?>