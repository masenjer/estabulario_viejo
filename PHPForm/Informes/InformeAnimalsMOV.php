<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../rao/Accents.php"); 
include("../../PHP/Fechas.php"); 
include("InformeStock/MaketaInforme.php"); 

require("../../dompdf/autoload.inc.php");   

$text = MaketaInforme($data);


$fechaInforme = date("d/m/Y");

$text.='
	<p>Informe de animals emprats i recollits durant l\'any '.$_GET["Any"].' </p>
	<table cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Procediment</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Total</b></td>
	</tr>';


$SQL = "SELECT AM.IdProcediment, P.NumProc, SUM(UniMas) as UniMas, SUM(UniFam) as UniFam, E.NomEspecie_ca  
		
		FROM AnimalMOVCap AM
		
		INNER JOIN Procediment P
		ON P.IdProcediment = AM.IdProcediment
		
		INNER JOIN (Soca S
			INNER JOIN Especie E
			ON E.IdEspecie = S.IdEspecie)
		ON S.IdSoca = AM.IdSoca
		
		WHERE
				YEAR(Fecha) = '".$_GET["Any"]."'  
			AND(	TipusMOV = 10 
				OR	TipusMOV = 11) 
				
		GROUP BY AM.IdProcediment 
		
		ORDER BY P.NumProc  
";

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{	
			$total = intval($row["UniFam"])+intval($row["UniMas"]);
			
			$text .= '
		<tr>
			<td class="GridLine'.$i.'" style="width:150px;">'.$row["NumProc"].'</td>
			<td class="GridLine'.$i.'" style="width:100px;">'.utf8_encode($row["NomEspecie_ca"]).'</td>
			<td class="GridLine'.$i.'">'.$total.'</td>
		</tr>
	';
}

$text.='</table>';

//echo $text;

	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$dompdf->loadHtml($text); 
	$dompdf->render();
	$dompdf->stream("InformeStockAnual".$fechaInforme.".pdf");


?>