<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../PHP/Fechas.php"); 
include("../../rao/Accents.php"); 

include("DetallAutoEntrada/Detall.php");
include("DetallAutoEntrada/Maquetacio.php");
include("DetallAutoEntrada/FrangHor.php");

require("../../dompdf/autoload.inc.php");   


session_start();

$id = $_GET["id"];
$TP = $_GET["TP"];

$text = MaketacioAutoEntrada($id,$TP);

$text .=   
'<table width="100%" cellpadding="5pt" cellspacing="0" border="0">
	<tr>
		<td>'.MostraDadesPersonalsAE($id).'</td>	
	</tr>
	<tr>
		<td>'.MostraDadesGrupRecercaAE($id).'</td>	
	</tr>
	<tr>
		<td>'.MostraAreas($id).'</td>
	</tr>
	<tr>
		<td>'.ContactoOtrosAnimales($id).'</td>
	</tr>
	<tr>
		<td>'.CarregaMotiuAccesSE($id).'</td>
	</tr>';
if ($TP == "13")
{
	$text .= '	
	<tr>
		<td>'.CarregaFrangHor($id).'</td>
	</tr>';
}
	$text .= '	
	<tr>
		<td>'.CarregaCompromis().'</td>
	</tr>	
 </table>	
';




//
//	$text .= MostraObservacions($id);
//	
//	echo utf8_decode($text);
//	
	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$dompdf->loadHtml($text); 
	$dompdf->render();
	$dompdf->stream("AccesEstabulari_".$id.".pdf");









?>