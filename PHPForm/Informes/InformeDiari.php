<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../rao/Accents.php"); 
include("../../PHP/Fechas.php"); 
include("InformeDiari/MaketaInforme.php"); 
include("InformeDiari/00.php"); 
include("InformeDiari/01.php"); 
include("InformeDiari/02.php"); 
include("InformeDiari/03.php"); 
include("InformeDiari/04y05.php"); 
include("InformeDiari/06.php"); 
include("InformeDiari/07.php"); 
include("InformeDiari/08.php"); 
include("InformeDiari/11.php"); 
include("InformeDiari/12.php"); 
include("InformeDiari/13.php"); 
include("InformeDiari/14.php"); 
include("InformeDiari/16.php"); 
include("../SelectSetGramsDies.php");

require("../../dompdf/autoload.inc.php");   

$data = $_GET["data"];
$fecha = InsertFecha($data);

$text = MaketaInforme($data);


$NInf = array("00","01","02","03","04y05","06","07","08","11","12","16","13","14");
$Titol = array( "- Reserva d'espais i equips al SE<br>",
				"- Animals estabulats al SE<br>",
				"- Femelles acoblades<br>",
				"- Compra d'animals<br>",
				"- Compra de fungibles<br>",
				"- Hormonaci&oacute; i Encreuaments<br>",
				"- Encreumants<br>",
				"- G&agrave;bies i animals<br>",
				"- Sol·licitud d' espai per a l'allotjament d'animals<br>",
				"- Av&iacute;s d'arribada de paqueteria<br>",
				"- Entrada de materials a la Planta Baixa<br><br>",
				"- Acc&eacute;s Puntual al Servei d\'Estabulari<br><br>",
				"- Acc&eacute;s Fora d\'Horari<br><br>");

$cadena = explode("|",$_GET["r"]);

$text.= "<p>Informes demanats:</p>";


foreach ($cadena as $value) 
{
	$text.= $Titol[$value];
	//echo $Titol[$value];
}


foreach ($cadena as $value) 
{
	//echo $i.": InfoData".$NInf[$value],$fecha;
	$text.= call_user_func("InfoData".$NInf[$value],$fecha);
}
//echo $text;

	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$dompdf->loadHtml($text); 
	$dompdf->setPaper('A4','landscape');
	$dompdf->render();
	$dompdf->stream($fecha.".pdf");

?>
