<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php");
include("Observacions.php"); 

/////:Nom,:NIF,:Tel,:Email,AC:,:CE,:Area,:OZ,:Motiu,:CA,:Horari

$EM = $_POST["EM"];

$Obs = $_POST["Obs"];

$IdCC= ComandaCap(16,"","");
if ($Obs) Observacions($IdCC,$Obs);

////////Contacte amb altres animals
/////Se ha de recorrer 5 veces el $CA

$cadena = explode("#",$EM);


for ($i=0;$i<count($cadena);$i++)
{
	$c = explode("|",$cadena[$i]);
		
	$SQL = "INSERT INTO EntradaMaterialsPB(IdComandaCap, Materials, Fecha) VALUES ($IdCC,'".Pon($c[1])."','".InsertFecha($c[0])."')"; 		
	$result = mysql_query($SQL,$oConn);
	//echo $SQL;
}
 
$mensaje = '
	<p>N&uacute;mero de comanada:'.$IdCC.'</p>
	<p>Podeu accedir a partir del seg&uuml;ent <a href="https://estabulari.uab.cat/admin">enllaç</a> </p>';

$asunto = 'Nova petició de\'sol·licitud d\'entrada de materials en la planta baixa / zona protegida: '.$IdCC;

//$desti="rafael.alarcon@uab.cat";
$desti1 = "se.suport.veterinari@uab.cat";

//$sheader="From:importacions@estabulari.uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
$sheader="From:EntradaMaterialPlantaBaixa@estabulari.uab.cat \nReply-To:se.suport.veterinari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti1,$asunto,$mensaje,$sheader);

$desti2 = "s.estabulari@uab.cat";

$sheader="From:EntradaMaterialPlantaBaixa@estabulari.uab.cat \nReply-To:s.estabulari@uab.cat\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti2,$asunto,$mensaje,$sheader);
echo "1";
?>