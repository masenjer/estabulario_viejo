<?php
include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../rao/Accents.php"); 
include("../../PHP/Fechas.php"); 
//include("InformeStockXLS/MaketaInforme.php"); 
include("InformeStockXLS/ComprovaStock.php"); 

require("../../PHPExcel/PHPExcel.php"); 

$hoy = date("d/m/Y");

$objPHPExcel = new PHPExcel();

// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("Centre de Recursos Docents") // Nombre del autor
    ->setLastModifiedBy("Centre de Recursos Docents") //Ultimo usuario que lo modificó
    ->setTitle('Informe d\' animals emprats i recollits durant l\'any '.$_GET["Any"]) // Titulo
    ->setSubject('Informe d\' animals emprats i recollits durant l\'any '.$_GET["Any"]) //Asunto
    ->setDescription('Informe d\' animals emprats i recollits durant l\'any '.$_GET["Any"]) //Descripción
    ->setKeywords('Informe d\' animals emprats i recollits durant l\'any '.$_GET["Any"]) //Etiquetas
    ->setCategory("Reporte excel"); //Categorias
	
$tituloReporte = 'Informe d\' animals emprats i recollits durant l\'any '.$_GET["Any"];
$titulosColumnas = array('PROCEDIMENT','ESPECIE', 'TOTAL');

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:D1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2]);
	
$objPHPExcel->getActiveSheet()->setAutoFilter("A3:C3"); 

////////////////////////////Contenidos


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
			AND(	TipusMOV = 5 
				OR	TipusMOV = 10 
				OR	TipusMOV = 11) 
				
		GROUP BY AM.IdProcediment 
		
		ORDER BY P.NumProc  
";
			
	$result = mysql_query($SQL,$oConn);
	
	$i = 4;
	
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
			
	$objPHPExcel->setActiveSheetIndex(0)
		 ->setCellValue('A'.$i, $row["NumProc"])
		 ->setCellValue('B'.$i, $row["NomEspecie_ca"])
		 ->setCellValue('C'.$i, $total);
	
	$i++;		
	}
	
	

$estiloTituloReporte = array(
    'font' => array(
        'name'      => 'Verdana',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>14,
        'color'     => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'argb' => 'FF220835')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);
 
$estiloTituloColumnas = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size' =>12,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
    'rotation'   => 90,
        'startcolor' => array(
            'rgb' => 'a8c4c7'
        ),
        'endcolor' => array(
            'argb' => '0f4147'
        )
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '17616a'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '17616a'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);
 
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'size' =>10,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array(
            'argb' => 'd9e5e7')
    ),
    'borders' => array(
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
        'color' => array(
                'rgb' => '17616a'
            )
        )
    )
));

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:C".($i-1));



for($i = 'A'; $i <= 'C'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setWidth(30);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('STOCK');
 
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
 
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="InformeAnualStock'.$hoy.'.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>
