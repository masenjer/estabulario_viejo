<?php

function CuerpoInformeStock(){
	
	include("../../../rao/EstabulariForm_con.php");
	include("ComprovaStock.php"); 
	
	session_start();
	
	$idP = $_GET["NumProc"];
	$id = $_GET["id"];
	$form = $_GET["form"];
	$idS = $_GET["idS"];
	$UniMas = 0;
	$UniFam = 0;
	
	$aux = $_GET["aux"];
	
	
	$resultado = '
	<table width="100%" cellpadding="5px" cellspacing="0" border="0">
		<tr>
			<td class="CapcaGrid">Especie</td>
			<td class="CapcaGrid">Soca</td>
			<td class="CapcaGrid">Data Naixement</td>
			<td class="CapcaGrid">Procediment</td>
			<td class="CapcaGrid">Mascles</td>
			<td class="CapcaGrid">Femelles</td>
			<td class="CapcaGrid">Mascles reservats</td>
			<td class="CapcaGrid">Femelles reservades</td>
			<td class="CapcaGrid">Total</td>
		</tr>';
	
	$SQL = "SELECT DISTINCT AC.FechaNacimiento, AC.IdProcediment, P.NumProc, E.NomEspecie_ca, S.NomSoca, S.IdSoca, 						P.NumProc
			FROM AnimalMOVCap AC 
			LEFT JOIN Procediment P ON (AC.IdProcediment = P.IdProcediment)
			LEFT JOIN (Soca S LEFT JOIN Especie E ON E.IdEspecie = S.IdEspecie)
					ON S.IdSoca = AC.IdSoca
			ORDER BY E.NomEspecie_ca, S.NomSoca, AC.FechaNacimiento, P.NumProc	
				";
	
	//echo $SQL;	
			
	$result = mysql_query($SQL,$oConn);
	
	$i=0;

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
	return $resultado;
}
	
function EnmaquetaTaulaDN($Especie,$Soca,$DN,$Proc,$UM,$UF,$UMR,$UFR,$i)
{
	if ($Proc == "9999") $Proc = "";
	
	$i %=2;
	
	$Total = $UFR+$UMR+$UF+$UM;
		
	$resultado = '
	<tr>
		<td class="GridLine'.$i.'" style="width:70">'.normaliza($Especie).'</td>
		<td class="GridLine'.$i.'" style="width:100">'.$Soca.'</td>
		<td class="GridLine'.$i.'" style="width:70">'.$DN.'</td>
		<td class="GridLine'.$i.'" style="width:70">'.$Proc.'</td>
		<td class="GridLine'.$i.'" style="width:70">'.$UM.'</td>
		<td class="GridLine'.$i.'" style="width:70">'.$UF.'</td>				
		<td class="GridLine'.$i.'" style="width:70">'.$UMR.'</td>
		<td class="GridLine'.$i.'" style="width:70">'.$UFR.'</td>				
		<td class="GridLine'.$i.'" style="width:70">'.$Total.'</td>				
	</tr>
	';
	
	return $resultado;
}

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
   // $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

