<?php
function ComprovaStock($id, $NProc, $DN, $res)
{
	include("../../rao/EstabulariForm_con.php");
	
	$SQLStock = "SELECT UniMas, UniFam, TipusMOV  
			FROM AnimalMOVCap 
			WHERE IdProcediment = $NProc 
			AND IdSoca = $id 
			AND FechaNacimiento = '$DN' 
			ORDER BY IdAnimalMOVCap ASC";
	if(!$resultStock = mysql_query($SQLStock)) die("error:"+mysql_error());
	
	//echo $SQLStock;
	
	$UM = 0;
	$UH = 0;
	$UMR = 0;
	$UHR = 0;
	
	while ($row22 = mysql_fetch_array($resultStock))
	{			
		switch($row22["TipusMOV"])
		{
			case "1": 	$UM = $row22["UniMas"];
						$UH = $row22["UniFam"];
						$UMR = 0;
						$UHR = 0;
						break;	
			case "2": 	
			case "3": 	$UM += $row22["UniMas"];
						$UH += $row22["UniFam"];
						break;	
			case "4": 		
			case "5":
			case "8":   //Excedent
			case "9": 	//Sexat
						$UM -=  $row22["UniMas"];
						$UH -=  $row22["UniFam"];
						break;	
			case "6": 	$UM -= $row22["UniMas"];
						$UH -= $row22["UniFam"];
						$UMR += $row22["UniMas"];
						$UHR += $row22["UniFam"];
						break;
			
			case "7": 	$UM += $row22["UniMas"];
						$UH += $row22["UniFam"];
						$UMR -= $row22["UniMas"];
						$UHR -= $row22["UniFam"];
						break;
		}
	}
	
	if ($res == "0") return $UM."|".$UH;
	else return $UMR."|".$UHR;

	//if(($NSM>$UM)||($NSH>$UH)) return 0;
	//else return 1;	
}
?>