<?php
function CarregaCercaInvestigadorValidat($Filtre)
{
	
	$CadenaFacturada = "";
	
	$r = array("Pendent","Validat");
	
	$resultado =  '
	<div id="DIVInvestigadorValidat" class="CercaSelect" style=" width:100px; display:none; height:80px; overflow:auto;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td height="10px"></td>
			</tr>';
	
	for ($id=0;$id<2;$id++)
	{	
		if (($CadenaFacturada !="")||($CadenaFacturada != 0)) $CadenaFacturada = $CadenaFacturada .'|'. $id;
		else $CadenaFacturada = $CadenaFacturada . $id;
		
		if ($Filtre == "")
		{
			$accio = "0";
			$img = "1";
		}else
		{
			$accio = "1";
			$img = "0";
		}
		
		foreach (explode("|",$Filtre) as $fila)
		{
			if (($fila == $id)||($fila != "vacia"))
			{
				$accio = "0";
				$img = "1";
			}
		}
		
		$resultado = $resultado . '
			<tr id="TRValidado'.$id.'" onclick="MarcaDesmarca(\'Validado\','.$accio.',\''.$id.'\','.$id.');">
				<td class="TRSelect"><div id="ImgValidado'.$id.'"><img src="img/Grid/CuadradoCheck'.$img.'.jpg"></div></td>
				<td class="TRSelect">'.$r[$id].'</td>    	
			</tr>';
	}
	$resultado = $resultado . '
			<tr>
				<td height="10px"></td>
			</tr>
		</table>
	</div>';
	
return $resultado."###".$CadenaFacturada;
}
?>