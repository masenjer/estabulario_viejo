<?php
function CanviaElementsStock($IdProcN,$IdProcA,$IdSoca,$IdCC,$S,$C,$FN)
{
	session_start();
	
	include("../../../../rao/EstabulariForm_con.php");
	include("../../../../PHP/Fechas.php"); 
	include("../ComprovaStock.php");
	
	$hoy = date("Y-m-d");
	$error = 0;
	
	$UniMas = 0;
	$UniFam = 0;
	
	$D =  InsertFecha($DN);
		
	$data = ComprovaStock($idSoca, $NProcA, $D, 0);
	$cadena = explode("|",$data);
	
	if ($S == "M") if ($cadena[0]>$C)$UniMas = $C;else $error=1;
	else  if ($cadena[1]>$C)$UniFam = $C;else $error=1;
	
	if ($error == 0)
	{
		$SQL = "INSERT INTO AnimalMOVCap
				(IdComandaCap, IdProcediment, IdSoca, FechaNacimiento, UniMas, UniFam, Fecha, TipusMOV, IdUser )
				VALUES
				(".$IdCC.",".$IdProcA.",".$IdSoca.",'".$D."',".$UniMas.",".$UniFam.",'".InsertFecha($hoy)."',5,".$_SESSION["IdA"].")";
		$result = mysql_query($SQL,$oConn);
		
		
		$SQL = "INSERT INTO AnimalMOVCap
				(IdComandaCap, IdProcediment, IdSoca, FechaNacimiento, UniMas, UniFam, Fecha, TipusMOV, IdUser )
				VALUES
				(".$IdCC.",".$IdProcN.",".$IdSoca.",'".$D."',".$UniMas.",".$UniFam.",'".InsertFecha($hoy)."',3,".$_SESSION["IdA"].")";
		$result = mysql_query($SQL,$oConn);
	}
	return $error;	
}
?>