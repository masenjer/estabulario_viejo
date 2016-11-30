<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../PHP/Fechas.php"); 
include("InformeFacturacio/MaketaInforme.php"); 
include("InformeFacturacio/00.php"); 
include("InformeFacturacio/01.php"); 
include("InformeFacturacio/02.php"); 
include("InformeFacturacio/03.php"); 
include("InformeFacturacio/04y05.php");  
include("InformeFacturacio/06.php"); 
include("InformeFacturacio/07.php"); 
include("InformeFacturacio/10.php"); 
include("InformeFacturacio/11.php"); 
include("InformeFacturacio/Caixes.php"); 

include("../SelectSetGramsDies.php");

require("../../dompdf/dompdf_config.inc.php"); 
set_time_limit(0); 
ini_set("memory_limit", "999M");
//ini_set("max_execution_time", "999");
ini_set('max_execution_time', 300);

//Data incial: f1
$f1 = $_GET["f1"];
$f1 = InsertFecha($f1);

//Data final: f2
$f2 = $_GET["f2"];
$f2 = InsertFecha($f2);


//Dades d'investigador principal o projecte 
if ($_GET["PR"]) $CondIPoProj = " AND Pr.IdProjecte = ".$_GET["PR"];
elseif ($_GET["IP"]) $CondIPoProj = " AND I.IdInvestigador = ".$_GET["IP"];

$text = MaketaInforme($f1,$f2);

$NInf = array("00","01","02","03","04y05","06","07","10","11","Caixes");

$fecha = $f1."|".$f2."|".$CondIPoProj;

foreach ($NInf as $v) //($i=0;$i<10;$i++)  
{
	$text.= call_user_func("InfoData".$v,$fecha);
}

	echo $text; 
	
//	$dompdf = new DOMPDF();
//	$dompdf->load_html(utf8_decode($text));
//	$dompdf->set_paper('A4','landscape');
//	$dompdf->render();
//	$dompdf->stream("Facturacio_desde_".$f1."_fins_".$f2.".pdf"); 

?>
