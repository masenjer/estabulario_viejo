<?php
function CarregaCercaDIVTipusComanda($Filtre)
{
	include("../rao/EstabulariForm_con.php");

	$CadenaTipusComanda = "";
	$id = 0;
	
	$resultado =  '
	<div id="DIVTipusComanda" class="CercaSelect" style=" width:295px; display:none; height:450px; overflow:auto;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr onclick="MarcaTots(\'TipusComanda\');">
				<td class="TRSelect1Peque"><img src="img/Grid/CuadradoCheck1.jpg"></td>
				<td class="TRSelect1Peque">Marcar tots</td>
			</tr>
			<tr onclick="DesmarcaTots(\'TipusComanda\');">
				<td class="TRSelect0Peque"><img src="img/Grid/CuadradoCheck0.jpg"></td>
				<td class="TRSelect0Peque">Desmarcar </td>
			</tr>
			<tr>
				<td height="10px"></td>
			</tr>
			';
	
	$SQL = "SELECT * FROM TipusComanda ORDER BY TipusComanda";				
	
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		if (($CadenaTipusComanda != "")||($CadenaTipusComanda != 0)) $CadenaTipusComanda = $CadenaTipusComanda .'|'.$row["IdTipusComanda"];
		else $CadenaTipusComanda = $CadenaTipusComanda.$row["IdTipusComanda"];
		
		if ($Filtre == "")
		{
			$accio = "0";
			$img = "1";
		}else
		{
			$accio = "1";
			$img = "0";
		}
		
		if ($Filtre == "vacia")
		{
			$accio = "1";
			$img = "0";
		}
		else
		{
			foreach (explode("|",$Filtre) as $fila)
			{
				if ($fila == $row["IdTipusComanda"])
				{
					$accio = "0";
					$img = "1";
				}
			}
		}
		
		$resultado = $resultado . '
			<tr id="TRTipusComanda'.$id.'" onclick="MarcaDesmarca(\'TipusComanda\','.$accio.',\''.$row["IdTipusComanda"].'\','.$id.');">
				<td class="TRSelect"><div id="ImgTipusComanda'.$id.'"><img src="img/Grid/CuadradoCheck'.$img.'.jpg"></div></td>
				<td class="TRSelect">'.$row["TipusComanda"].'</td>    	
			</tr>';
			$id++;
	}
	$resultado = $resultado . '
			<tr>
				<td height="10px"></td>
			</tr>
		</table>
	</div>';
	
return $resultado."###".$CadenaTipusComanda;
}


/*

<?php
function CarregaCercaDIVTipusComanda($Filtre)
{
	include("../rao/EstabulariForm_con.php");

	$CadenaTipusComanda = "";
	
	$resultado =  '
	<div id="DIVTipusComanda" class="CercaSelect" style=" width:295px; display:none; height:450px; overflow:auto;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr onclick="MarcaTots(\'TipusComanda\');">
				<td class="TRSelect1Peque"><img src="img/Grid/CuadradoCheck1.jpg"></td>
				<td class="TRSelect1Peque">Marcar tots</td>
			</tr>
			<tr onclick="DesmarcaTots(\'TipusComanda\');">
				<td class="TRSelect0Peque"><img src="img/Grid/CuadradoCheck0.jpg"></td>
				<td class="TRSelect0Peque">Desmarcar </td>
			</tr>
			<tr>
				<td height="10px"></td>
			</tr>
			';
			
	$SQL = "SELECT * FROM TipusComanda ORDER BY TipusComanda";				
	
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		
		if (($CadenaTipusComanda != "")) $CadenaTipusComanda = $CadenaTipusComanda .'|'. $row["IdTipusComanda"];
		else $CadenaTipusComanda = $CadenaTipusComanda.$row["IdTipusComanda"];
		
		if ($Filtre == "")
		{
			$accio = "0";
			$img = "1";
		}else
		{
			$accio = "1";
			$img = "0";
		}
		
		if ($Filtre == "vacia")
		{
			$accio = "1";
			$img = "0";
		}
		else
		{
			foreach (explode("|",$Filtre) as $fila)
			{
				if ($fila == $row["IdTipusComanda"])
				{
					$accio = "0";
					$img = "1";
				}
			}
		}
		
		$resultado = $resultado . '
			<tr id="TRTipusComanda'.$row["IdTipusComanda"].'" onclick="MarcaDesmarca(\'TipusComanda\','.$accio.',\''.$row["IdTipusComanda"].'\','.$row["IdTipusComanda"].');">
				<td class="TRSelect"><div id="ImgTipusComanda'.$row["IdTipusComanda"].'"><img src="img/Grid/CuadradoCheck'.$img.'.jpg"></div></td>
				<td class="TRSelect">'.$row["TipusComanda"].'</td>    	
			</tr>';
	}
	$resultado = $resultado . '
			<tr>
				<td height="10px"></td>
			</tr>
		</table>
	</div>';
	
return $resultado."###".$CadenaTipusComanda;
}
?>

*/
?>