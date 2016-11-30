<?php
function CarregaCercaDIVClient($Filtre)
{
	include("../rao/EstabulariForm_con.php");
	
	$CadenaClient = "";
	$id = 0;
	
	$SQL = "SELECT IdUser, Nom, Cognoms FROM Users order by Cognoms, Nom ASC";
	$result = mysql_query($SQL,$oConn);
	
	$resultado =  '
	<div id="DIVClient" class="CercaSelect" style=" width:153px; display:none; height:450px; overflow:auto;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr onclick="MarcaTots(\'IdUser\');">
				<td class="TRSelect1Peque"><img src="img/Grid/CuadradoCheck1.jpg"></td>
				<td class="TRSelect1Peque">Marcar tots</td>
			</tr>
			<tr onclick="DesmarcaTots(\'IdUser\');">
				<td class="TRSelect0Peque"><img src="img/Grid/CuadradoCheck0.jpg"></td>
				<td class="TRSelect0Peque">Desmarcar </td>
			</tr>
			<tr>
				<td height="10px"></td>
			</tr>
			';
	
	while ($row = mysql_fetch_array($result))
	{	
		if ($CadenaClient != "") $CadenaClient = $CadenaClient .'|'. $row["IdUser"];
		else $CadenaClient = $row["IdUser"];
		
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
			if ($fila == $row["IdUser"])
			{
				$accio = "0";
				$img = "1";
			}
		}
		
		$resultado = $resultado . '
			<tr id="TRIdUser'.$id.'" onclick="MarcaDesmarca(\'IdUser\','.$accio.',\''.$row["IdUser"].'\','.$id.');">
				<td class="TRSelect"><div id="ImgIdUser'.$id.'"><img src="img/Grid/CuadradoCheck'.$img.'.jpg"></div></td>
				<td class="TRSelect">'.$row["Cognoms"].', '.$row["Nom"].'</td>    	
			</tr>';
			$id++;
	}
	$resultado = $resultado . '
			<tr>
				<td height="10px"></td>
			</tr>
		</table>
	</div>';
	
return $resultado."###".$CadenaClient;
}
?>