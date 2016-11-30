<?php
function ComprovaStock($id, $NProc, $DN, $res)
{
	include("../../../rao/EstabulariForm_con.php");
	
	$SQL = "SELECT UniMas, UniFam, TipusMOV  
			FROM AnimalMOVCap 
			WHERE IdProcediment = $NProc 
			AND IdSoca = $id 
			AND FechaNacimiento = '$DN' 
			ORDER BY IdAnimalMOVCap ASC";
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

	//if(($NSM>$UM)||($NSH>$UH)) return 0;
	//else return 1;	
}
?>