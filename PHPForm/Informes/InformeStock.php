<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../rao/Accents.php"); 
include("../../PHP/Fechas.php"); 
include("InformeStock/MaketaInforme.php"); 
include("InformeStock/00.php"); 

require("../../dompdf/autoload.inc.php");   

$hoy = date("d/m/Y");

$fecha = InsertFecha($data);

$text = MaketaInforme($data);

$text.= CuerpoInformeStock();
$fechaInforme = date("d/m/Y");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($text); 
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream("Stock".$fechaInforme.".pdf");
?>