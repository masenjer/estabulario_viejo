<?php
function ReservaStock($IdProc,$IdSoca,$IdCC,$S,$C,$DN)
{
	session_start();
	include("../../../../rao/EstabulariForm_con.php");
	
	$hoy = date("Y-m-d");
	$error = 0;
	
	$UniMas = 0;
	$UniFam = 0;
	
	//echo "ComprovaStock(".$IdSoca.", ".$IdProc.", ".$DN.", 0)";
	
	$data = ComprovaStock($IdSoca, $IdProc, $DN, 0);
	
	//echo "-------------data:".$data."--------";
	
	
	//echo $hoy;
	$cadena = explode("|",$data);
	
	if ($S == "M") if ($cadena[0]>=$C)$UniMas = $C;else $error=1;
	else  if ($cadena[1]>=$C)$UniFam = $C;else $error=1;
	
	//echo "error:".$error;
	
	if ($error == 0)
	{
		$SQL = "INSERT INTO AnimalMOVCap
				(IdComandaCap, IdProcediment, IdSoca, FechaNacimiento, UniMas, UniFam, Fecha, TipusMOV, IdUser, NAlbaran, Reservat)
				VALUES
				(".$IdCC.",".$IdProc.",".$IdSoca.",'".$DN."',".$UniMas.",".$UniFam.",'".$hoy."',6,".$_SESSION["IdA"].",'',1)";
				//echo $SQL;
		$result = mysql_query($SQL,$oConn);
	}
		
	return $error;	
}
?>
