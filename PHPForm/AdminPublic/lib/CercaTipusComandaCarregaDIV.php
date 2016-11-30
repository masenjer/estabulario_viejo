<?php
function CarregaCercaDIVTipusComanda($Filtre)
{
	$CadenaTipusComanda = "";
	$id = 0;
	
	$r = array("Reserva d'espais i equips al SE",
				"Petició d' Animals Produits al SE",
				"Petició de famelles acoblades",
				"Compra d'animals",
				"Compra de dietes, jaços i caixes de transp",
				"Compra de fàrmacs, desinfectats i fungibles",
				"Hormonació i encreuaments",
				"Encreuaments",
				"Gàbies / Animals",
				"Importació",
				"Exportació",
				"Sol·licitut d'espai per allotjament animals",
				"Avís d'arribada paqueteria demanada proveidor",
				"Accés puntual al SE",
				"Accés fora horari al SE",
				"Autorització entrada al SE",
				"Entrada de materials a la planta baixa");
	
	$resultado =  '
	<div id="DIVTipusComanda" class="CercaSelect" style=" width:295px; display:none; height:450px; overflow:auto;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr onclick="MarcaTots(\'TipusComanda\');">
				<td class="TRSelect1Peque"><img src="img/Grid/CuadradoCheck1.jpg"></td>
				<td class="TRSelect1Peque">Marcar tots</td>
			</tr>
			<tr onclick="DesmarcaTots(\'TipusComanda\');">
				<td class="TRSelect0Peque"><img src="img/Grid/CuadradoCheck0.jpg"></td>
				<td class="TRSelect0Peque">Desmarcar tots </td>
			</tr>
			<tr>
				<td height="10px"></td>
			</tr>
			';
	
	for ($id =0;$id<17;$id++)
	{	
		if (($CadenaTipusComanda != "")||($CadenaTipusComanda != 0)) $CadenaTipusComanda = $CadenaTipusComanda .'|'. $id;
		else $CadenaTipusComanda = $CadenaTipusComanda.$id;
		
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
				if ($fila == $id)
				{
					$accio = "0";
					$img = "1";
				}
			}
		}
		
		$resultado = $resultado . '
			<tr id="TRTipusComanda'.$id.'" onclick="MarcaDesmarca(\'TipusComanda\','.$accio.',\''.$id.'\','.$id.');">
				<td class="TRSelect"><div id="ImgTipusComanda'.$id.'"><img src="img/Grid/CuadradoCheck'.$img.'.jpg"></div></td>
				<td class="TRSelect">'.$r[$id].'</td>    	
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