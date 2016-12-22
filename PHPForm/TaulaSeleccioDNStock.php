<?php
include("../rao/EstabulariForm_con.php");
include("ComprovaStock.php"); 
include("../PHP/Fechas.php"); 

session_start();

$idP = $_GET["NumProc"];
$id = $_GET["id"];
$form = $_GET["form"];
$idS = $_GET["idS"];
$UniMas = 0;
$UniFam = 0;

$aux = $_GET["aux"];


////////Comprueba NProc a los que tiene acceso 
//
//$SQL = "SELECT DISTINCT Procediment.IdProcediment  
//		FROM Procediment
//		INNER JOIN ProcedimentUser 
//		ON Procediment.IdProcediment = ProcedimentUser.IdProcediment
//		WHERE ProcedimentUser.IdUser = ". $_SESSION["IdUser"] ."
//		AND Procediment.IdProcediment <> ''";
//$result = mysql_query($SQL,$oConn);
//
//$condNProd = " AND ( AnimalMOVCap.IdProcediment = '' ";
//
//while ($row = mysql_fetch_array($result))
//{
//	$condNProd .= " OR  AnimalMOVCap.IdProcediment=".$row["IdProcediment"];	
//}
//

$resultado = '
<table width="100%" cellpadding="0" cellspacing="0" border="0" >
	';


//$SQL = "SELECT DISTINCT AC.FechaNacimiento, AC.IdProcediment, P.NumProc
//		FROM AnimalMOVCap AC 
//		INNER JOIN 
//			 	(
//				Procediment P 
//				INNER JOIN
//						ProcedimentUser PU
//						ON (P.IdProcediment = PU.IdProcediment OR P.IdProcediment = 12)					
//				)
//				ON AC.IdProcediment = P.IdProcediment
//			
//		WHERE 
//			AC.IdSoca = $idS AND
//			PU.IdUser = ". $_SESSION["IdUser"]."
//		ORDER BY AC.FechaNacimiento, P.NumProc	
//			";
$SQL = "SELECT DISTINCT AC.FechaNacimiento, AC.IdProcediment, P.NumProc
		FROM AnimalMOVCap AC 
		INNER JOIN 	Procediment P ON (AC.IdProcediment = P.IdProcediment)
				
		WHERE 
				AC.IdSoca = $idS 
			AND  P.IdProcediment = 12 
		ORDER BY AC.FechaNacimiento, P.NumProc	
			";

//echo $SQL;			
$result = mysql_query($SQL,$oConn);

$Fecha = "no";
$i=0;

while ($row = mysql_fetch_array($result))
{
	$data =  ComprovaStock($idS, $row["IdProcediment"], $row["FechaNacimiento"], 0);
	$cadena = explode ("|",$data);
	
	if (($cadena[0]>0)||($cadena[1]>0))
	{
		$resultado .=EnmaquetaTaulaDN(SelectFecha($row["FechaNacimiento"]),$row["NumProc"],$cadena[0],$cadena[1],$i, $id, $form, $row["IdProcediment"]);
		$i++;
	}
}



echo $resultado;


function EnmaquetaTaulaDN($DN,$Proc,$UM,$UF,$i,$id,$form, $idProc)
{
	if ($Proc == "9999") $Proc = "";
	
	if (($i % 2)==0)
	{
		$color = ' background:URL(img/Grid/LineaGridVerda.png)';
	}
	else
	{
		$color = '';	
	}
	$i++;
	
	$resultado = $resultado.'
	<tr onclick="AfegeixDataAmbStock(\''.$DN.'\',\''.$form.'\','.$id.', '.$UM.', '.$UF.', '.$idProc.');">
		<td class="fuenteForm" height="25px" style="width:225px;cursor:pointer; padding:5px;'.$color.' ">'.$DN.'</td>
		<td class="fuenteForm" height="25px" style="cursor:pointer; padding:5px;'.$color.' ">'.$Proc.'</td>
		<td class="fuenteForm" height="25px" style="text-align:center;width:140px;cursor:pointer; padding:5px; '.$color.'">'.$UM.'</td>
		<td class="fuenteForm" height="25px" style="text-align:center;width:125px;cursor:pointer; padding:5px; '.$color.'">'.$UF.'</td>				
	</tr>
	';
	
	return $resultado;
}
?>