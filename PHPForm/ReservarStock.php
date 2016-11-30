<?php
function ReservaStock($IdProc,$IdSoca,$IdCC,$S,$C,$DN)
{
	session_start();
	include("../rao/EstabulariForm_con.php");
	
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
				(".$IdCC.",".$IdProc.",".$IdSoca.",'".$DN."',".$UniMas.",".$UniFam.",'".$hoy."',6,".$_SESSION["IdUser"].",'',1)";
				//echo $SQL;
		$result = mysql_query($SQL,$oConn);
	}
		
	return $error;	
}

function AlliberaStock($IdProc,$IdSoca,$IdCC,$S,$C,$DN)
{
	session_start();
	
	include("../rao/EstabulariForm_con.php");
	
	$hoy = date("Y-m-d");
	$error = 0;
	
	$UniMas = 0;
	$UniFam = 0;
	
	//echo "ComprovaStock(".$IdSoca.", ".$IdProcA.", ".$DN.", 0)";
	
	$data = ComprovaStock($IdSoca, $IdProc, $DN, 1);
	
	//echo "-------------data:".$data."--------";
	
	
	//echo $hoy;
	$cadena = explode("|",$data);
	
	if ($S == "M") if ($cadena[2]>=$C)$UniMas = $C;else $error=1;
	else  if ($cadena[3]>=$C)$UniFam = $C;else $error=1;
	
	//echo "error:".$error;
	
	if ($error == 0)
	{
		$SQL = "INSERT INTO AnimalMOVCap
				(IdComandaCap, IdProcediment, IdSoca, FechaNacimiento, UniMas, UniFam, Fecha, TipusMOV, IdUser, NAlbaran, Reservat)
				VALUES
				(".$IdCC.",".$IdProc.",".$IdSoca.",'".$DN."',".$UniMas.",".$UniFam.",'".$hoy."',6,".$_SESSION["IdUser"].",'',0)";
		$result = mysql_query($SQL,$oConn);
	}
		
	return $error;	
}


function ComprovaStock($id, $NProc, $DN, $res)
{
	include("../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT UniMas, UniFam, TipusMOV  
			FROM AnimalMOVCap 
			WHERE IdProcediment = $NProc 
			AND IdSoca = $id 
			AND FechaNacimiento = '$DN' 
			ORDER BY IdAnimalMOVCap ASC";
			
	echo $SQL;		
	$result = mysql_query($SQL,$oConn);
	
	$UM = 0;
	$UH = 0;
	$UMR = 0;
	$UHR = 0;
	
	while ($row = mysql_fetch_array($result))
	{			
		switch($row["TipusMOV"])
		{
			case "1": 	$UM = $row["UniMas"];
						$UH = $row["UniFam"];
						$UMR = 0;
						$UHR = 0;
						break;	
			case "2": 	
			case "3": 	$UM += $row["UniMas"];
						$UH += $row["UniFam"];
						break;	
			case "4": 		
			case "5":
			case "8":   //Excedent
			case "9": 	//Sexat
			case "10":  //Recollida
			case "11":	//Utilitzacio
						$UM -=  $row["UniMas"];
						$UH -=  $row["UniFam"];
						break;	
			case "6": 	$UM -= $row["UniMas"];
						$UH -= $row["UniFam"];
						$UMR += $row["UniMas"];
						$UHR += $row["UniFam"];
						break;
			
			case "7": 	$UM += $row["UniMas"];
						$UH += $row["UniFam"];
						$UMR -= $row["UniMas"];
						$UHR -= $row["UniFam"];
						break;
		}
	}
	
	if ($res == "0") return $UM."|".$UH;
	else return $UMR."|".$UHR;
}
?>