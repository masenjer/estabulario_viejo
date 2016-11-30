<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../PHP/Fechas.php"); 

include("DetallEtiquetes/06.php"); 
include("DetallEtiquetes/07.php"); 

require("../../dompdf/autoload.inc.php");   
include("../SelectSetGramsDies.php");


session_start();

$id = $_GET["id"];

$SQL = "SELECT TipusForm FROM ComandaCap WHERE IdComandaCap=".$id ;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	switch ($row["TipusForm"])
	{
		case "6":	$text .= CarregaDetallComanda6($id);
					break;
		case "7":	$text .= CarregaDetallComanda7($id);
					break;
	}
}
//
//	$text .= MostraObservacions($id);
//	
//	echo utf8_decode($text);
//	
	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$dompdf->loadHtml($text); 
	$dompdf->render();
	$dompdf->stream("albara".$id.".pdf");

?>
