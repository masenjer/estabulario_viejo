<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");

$i = 0;

echo '
<input type="hidden" id="CadenaCerca">
<table width="860px" cellpadding="0" cellspacing="0" style=" border:solid; border-color:#b2b4b4; border-width:1px;">
  <tr class="CapcaGrid" valign="bottom">
	  <td width="110px" class="CapcaGrid" valign="middle">
	  	  Data Moviment
	  </td>
	  <td width="110px" class="CapcaGrid" valign="middle">
		  Comanda
	  </td>
	  <td width="110px" class="CapcaGrid" valign="middle">
		  Albar&agrave; Compra
	  </td>
	  <td width="130px" class="CapcaGrid" valign="middle">
		  Tipus Moviment
	  </td>
 	  <td width="100px" class="CapcaGrid" valign="middle">
		  Mascles
	  </td>
	  <td width="100px" class="CapcaGrid" valign="middle">
		  Femelles
	  </td>	
 	  <td width="100px" class="CapcaGrid" valign="middle">
		  Mascles res
	  </td>
	  <td width="100px" class="CapcaGrid" valign="middle">
		  Femelles res
	  </td>	

  </tr>';


$SQL = "SELECT AnimalMOVCap.Fecha, AnimalMOVCap.IdComandaCap, AnimalMOVCap.UniMas, AnimalMOVCap.UniFam, 
			   AnimalMOVCap.TipusMOV, AnimalMOVCap.NAlbaran, Procediment.Investigador, 			
			   Procediment.NumProc, Procediment.IdProcediment
		FROM AnimalMOVCap, Procediment 
		WHERE AnimalMOVCap.IdProcediment = Procediment.IdProcediment 
		AND IdSoca = ".$_GET["id"]." 
		AND FechaNacimiento = '".$_GET["f"]."' 
		ORDER BY Procediment.NumProc, AnimalMOVCap.IdAnimalMOVCap ASC"; 
$result = mysql_query($SQL,$oConn);
	
$TotalMClient= 0;
$TotalHClient = 0;
$TotalM = 0;
$TotalH = 0;
$TotalMClientR = 0;
$TotalHClientR = 0;
$TotalMR = 0;
$TotalHR = 0;

$NProc="";
$aux= 0;

while ($row = mysql_fetch_array($result))
{
	
	$CM = 0;
	$CH = 0;
	$CMR = 0;
	$CHR = 0;


	if ($row["NumProc"] != $NProc)
	{
		if ($aux != 0){
			 echo '		
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right"><b></b></td>
			<td align="center" class="TotalDetallProd">Total</td>
			<td align="center" class="TotalDetallProd">'.$TotalMClient.'</td>
			<td align="center" class="TotalDetallProd">'.$TotalHClient.'</td>
			<td align="center" class="TotalDetallProd">'.$TotalMClientR.'</td>
			<td align="center" class="TotalDetallProd">'.$TotalHClientR.'</td>
		</tr>';
		
		$TotalM += $TotalMClient;
		$TotalH += $TotalHClient;
		$TotalMR += $TotalMClientR;
		$TotalHR += $TotalHClientR;
		
		$TotalMClient= 0;
		$TotalHClient = 0;
		$TotalMClientR = 0;
		$TotalHClientR = 0;
		
		}else $aux = 1;

		echo '
		<tr>
			<td id="TDCapTaulaStock'.$row["IdProcediment"].'" colspan="8" class="GridLineCapca" onclick="MostraAmagaDetallTaulaStock('.$row["IdProcediment"].',0);">
				<div class="DIVGridLineCapca" height="20px"><img id="FlechaCapcaGrid'.$row["IdProcediment"].'" src="img/FlechaCapcaGrid.png" style="margin-top:2px">&nbsp;&nbsp;Procediment <b>'.$row["NumProc"].'</b>: '.$row["Investigador"].'</div>
			</td>
		</tr>
		<tr>
			<td colspan="8">
				<div id="DIVTaulaSTock'.$row["IdProcediment"].'" style="display:none;">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">		
			';		
		$NProc = $row["NumProc"];
	}
	
	switch($row["TipusMOV"])
	{
		case "1": 	$TitolTipus = "Inventari";
					$TotalMClient = $row["UniMas"];
					$TotalHClient = $row["UniFam"];
					$TotalMClientR = 0;
					$TotalHClientR = 0;
					$i = 2;
					break;	
		case "2": 	$TitolTipus = "Naixement";
					$TotalMClient = $TotalMClient + $row["UniMas"];
					$TotalHClient = $TotalHClient + $row["UniFam"];
					$i = 3;
					break;	
		case "3": 	$TitolTipus = "Compra";
					$TotalMClient = $TotalMClient + $row["UniMas"];
					$TotalHClient = $TotalHClient + $row["UniFam"];
					$i = 3;
					break;	
		case "4": 	$TitolTipus = "Mort";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$i = 4;
					break;	
		case "5": 	$TitolTipus = "Venda";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$i = 4;
					break;	
		case "6": 	$TitolTipus = "Reserva";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$TotalMClientR = $TotalMClientR + $row["UniMas"];
					$TotalHClientR = $TotalHClientR + $row["UniFam"];
					$i = 5;
					break;	
		case "7": 	$TitolTipus = "Allibera";
					$TotalMClient = $TotalMClient + $row["UniMas"];
					$TotalHClient = $TotalHClient + $row["UniFam"];
					$TotalMClientR = $TotalMClientR - $row["UniMas"];
					$TotalHClientR = $TotalHClientR - $row["UniFam"];
					$i = 5;
					break;	
		case "8": 	$TitolTipus = "Excedent";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$i = 4;
					break;	
		case "9": 	$TitolTipus = "Sexat";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$i = 4;
					break;	
		case "10": 	$TitolTipus = "Utilitzaci&oacute;";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$i = 4;
					break;	
		case "11": 	$TitolTipus = "Recollida";
					$TotalMClient = $TotalMClient - $row["UniMas"];
					$TotalHClient = $TotalHClient - $row["UniFam"];
					$i = 4;
					break;	

	}
	
	if($row["TipusMOV"] == 6)
	{
		$CM = "-".$row["UniMas"];
		$CH = "-".$row["UniFam"];				
		$CMR = $row["UniMas"];
		$CHR = $row["UniFam"];
	}
	else
	{
		if($row["TipusMOV"] == 7)
		{
			$CM = $row["UniMas"];
			$CH = $row["UniFam"];				
			$CMR = "-".$row["UniMas"];
			$CHR = "-".$row["UniFam"];
		}
		else
		{
		if (($row["TipusMOV"]== 4)||($row["TipusMOV"]== 5)||($row["TipusMOV"]== 8)||($row["TipusMOV"]== 9)||($row["TipusMOV"]== 10)||($row["TipusMOV"]== 11))
			{
				$CM = "-".$row["UniMas"];
				$CH = "-".$row["UniFam"];				
			}else
			{
				$CM = $row["UniMas"];
				$CH = $row["UniFam"];	
			}
		}
	}
	
		
			
	  echo'	
	  <tr>
		  <td width="110px" align="center" class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
		  <td width="110px" align="center" class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
		  <td width="110px" align="center" class="GridLine'.$i.'">'.$row["NAlbaran"].'</td>
		  <td width="130px" align="left" class="GridLine'.$i.'">'.$TitolTipus.'</td>
		  <td width="100px" align="center" class="GridLine'.$i.'">'.$CM.'</td>
		  <td width="100px" align="center" class="GridLine'.$i.'">'.$CH.'</td>
		  <td width="100px" align="center" class="GridLine'.$i.'">'.$CMR.'</td>
		  <td width="100px" align="center" class="GridLine'.$i.'">'.$CHR.'</td>
	  </tr>';
	  
	

}

		$TotalM += $TotalMClient;
		$TotalH += $TotalHClient;
		$TotalMR += $TotalMClientR;
		$TotalHR += $TotalHClientR;

echo '
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right"><b></b></td>
			<td align="center" class="TotalDetallProd">Total</td>
			<td align="center" class="TotalDetallProd">'.$TotalMClient.'</td>
			<td align="center" class="TotalDetallProd">'.$TotalHClient.'</td>
			<td align="center" class="TotalDetallProd">'.$TotalMClientR.'</td>
			<td align="center" class="TotalDetallProd">'.$TotalHClientR.'</td>
		</tr>
	</table><td></tr><tr><td height="100%"></td></tr></table>|
	<table width="860px" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td width="370px" align="right"><b></b></td>
			<td width="130px" align="center" class="TotalTaulaProd">Total</td>
			<td width="100px" align="center" class="TotalTaulaProd">'.$TotalM.'</td>
			<td width="100px" align="center" class="TotalTaulaProd">'.$TotalH.'</td>
			<td width="100px" align="center" class="TotalTaulaProd">'.$TotalMR.'</td>
			<td width="100px" align="center" class="TotalTaulaProd">'.$TotalHR.'</td>
		</tr>
	</table>
	
	';

?>