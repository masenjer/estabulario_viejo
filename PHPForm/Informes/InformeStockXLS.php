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
    ->setTitle("Stock de l' estabulari a dia ".$hoy) // Titulo
    ->setSubject("Stock de l' estabulari a dia ".$hoy) //Asunto
    ->setDescription("Stock de l' estabulari a dia ".$hoy) //Descripción
    ->setKeywords("Stock de l' estabulari a dia ".$hoy) //Etiquetas
    ->setCategory("Reporte excel"); //Categorias
	
$tituloReporte = "Stock de l' estabulari a dia ".$hoy;
$titulosColumnas = array('ESPECIE', 'SOCA', 'DATA DE NAIXEMENT', 'PROCEDIMENT', 'MASCLES', 'FEMELLES', 'MASCLES RESERVATS', 'FEMELLES RESERVADES', 'TOTAL');

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:D1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2])
    ->setCellValue('D3',  $titulosColumnas[3])
    ->setCellValue('E3',  $titulosColumnas[4])
    ->setCellValue('F3',  $titulosColumnas[5])
    ->setCellValue('G3',  $titulosColumnas[6])
    ->setCellValue('H3',  $titulosColumnas[7])
    ->setCellValue('I3',  $titulosColumnas[8]);

$objPHPExcel->getActiveSheet()->setAutoFilter("A3:I3"); 

////////////////////////////Contenidos




	$UniMas = 0;
	$UniFam = 0;
	$i = 4;
	
	$SQL = "SELECT DISTINCT AC.FechaNacimiento, AC.IdProcediment, P.NumProc, E.NomEspecie_ca, S.NomSoca, AC.IdSoca, P.NumProc
            FROM AnimalMOVCap AC 
            INNER JOIN Procediment P ON (AC.IdProcediment = P.IdProcediment)
            INNER JOIN (Soca S LEFT JOIN Especie E ON E.IdEspecie = S.IdEspecie)
                    ON S.IdSoca = AC.IdSoca
            ORDER BY E.NomEspecie_ca, S.NomSoca, AC.FechaNacimiento, P.NumProc  
				";
	
	//echo $SQL;	
			
	$result = mysql_query($SQL);
	

	while ($row = mysql_fetch_array($result))
	{

        $data =  ComprovaStock($row["IdSoca"], $row["IdProcediment"], $row["FechaNacimiento"], 0);
		$cadena = explode ("|",$data);
		
		$dataR =  ComprovaStock($row["IdSoca"], $row["IdProcediment"], $row["FechaNacimiento"], 1);
		$cadenaR = explode ("|",$dataR);
		
		if (($cadena[0]>0)||($cadena[1]>0)||($cadenaR[0]>0)||($cadenaR[1]>0))
		{

           // echo "cepa:".$row["NomEspecie_ca"].",".$row["NomSoca"].",".$cadena[0].",".$cadena[1].",".$cadenaR[0].",".$cadenaR[1];
			
			if ($Proc == "9999") $Proc = "";
		
			$Total = $UFR+$UMR+$UF+$UM;
			
			$objPHPExcel->setActiveSheetIndex(0)
				 ->setCellValue('A'.$i, $row["NomEspecie_ca"])
				 ->setCellValue('B'.$i, $row["NomSoca"])
				 ->setCellValue('C'.$i, SelectFecha($row["FechaNacimiento"]))
				 ->setCellValue('D'.$i, $row["NumProc"])
				 ->setCellValue('E'.$i, $cadena[0])
				 ->setCellValue('F'.$i, $cadena[1])
				 ->setCellValue('G'.$i, $cadenaR[0])
				 ->setCellValue('H'.$i, $cadenaR[1])
				 ->setCellValue('I'.$i, $Total);

			
			$i++;

		}
	}
	
	
	/*echo $resultado;
	return $resultado;
*/
	











/////////////////////

//Stilo

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
$objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:I".($i-1));



for($i = 'A'; $i <= 'I'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
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
header('Content-Disposition: attachment;filename="STOCK'.$hoy.'.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;







?>
