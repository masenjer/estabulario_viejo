<?php

function RellenaContenidosStock(){
	
	include("../../rao/EstabulariForm_con.php");
	include("ComprovaStock.php"); 
	
	session_start();
	
	$UniMas = 0;
	$UniFam = 0;
	
	$SQL = "SELECT DISTINCT AC.FechaNacimiento, AC.IdProcediment, P.NumProc, E.NomEspecie_ca, S.NomSoca, S.IdSoca, 						P.NumProc
			FROM AnimalMOVCap AC 
			LEFT JOIN Procediment P ON (AC.IdProcediment = P.IdProcediment)
			LEFT JOIN (Soca S LEFT JOIN Especie E ON E.IdEspecie = S.IdEspecie)
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
			$resultado .=EnmaquetaTaulaDN($row["NomEspecie_ca"],$row["NomSoca"],SelectFecha($row["FechaNacimiento"]),$row["NumProc"],$cadena[0],$cadena[1],$cadenaR[0],$cadenaR[1],$i, $id, $form, $row["IdProcediment"]);
			$i++;

		}
	}
	
	
	//echo $resultado;
	//return $resultado;
}
	
function EnmaquetaTaulaDN($Especie,$Soca,$DN,$Proc,$UM,$UF,$UMR,$UFR,$i)
{
	if ($Proc == "9999") $Proc = "";
		
	$Total = $UFR+$UMR+$UF+$UM;
	
	$objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('A'.$i, $Especie)
         ->setCellValue('B'.$i, $Soca)
         ->setCellValue('C'.$i, $DN)
         ->setCellValue('D'.$i, $Proc)
         ->setCellValue('E'.$i, $UM)
         ->setCellValue('F'.$i, $UF)
         ->setCellValue('G'.$i, $UMR)
         ->setCellValue('H'.$i, $UFR)
         ->setCellValue('I'.$i, $Total);
		

	
}

