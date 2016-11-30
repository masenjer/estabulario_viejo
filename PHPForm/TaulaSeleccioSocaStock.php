<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];
$idS = $_GET["idS"];
$UniMas = 0;
$UniFam = 0;

$aux = $_GET["aux"];

if ($aux)
{
	$cadena = explode("|",$aux);
	$cond = "";
	
	for ($i=0;$i< count($cadena);$i++)
	{
		$cond .= " AND IdSoca <> ".$cadena[$i]; 
	}
}

$i = 0;

$resultado = '
	<table width="100%" cellpadding="0" cellspacing="0" border="0" >
		<tr class="CapGrid">
			<td height="27px" class="CapcaGrid">Nombre de la Cepa</td>			
			<td height="27px" class="CapcaGrid">Unidades de Machos</td>			
			<td height="27px" class="CapcaGrid">Unidades de Hembras</td>			
		</tr>';

$SQL = "SELECT IdSoca
		FROM Soca
		WHERE IdEspecie = $idS ". $cond;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$SQL2 = "SELECT IdAnimalMOVCap, UniMas, UniFam 
			FROM AnimalMOVCap
			WHERE IdSoca =".$row["IdSoca"]."
			AND TipusMOV = 1
			ORDER BY IdAnimalMOVCap DESC
			LIMIT 1";
	$result2 = mysql_query($SQL2,$oConn);
	
	while ($row2 = mysql_fetch_array($result2))
	{
		$IdAnimalMOVCap = $row2["IdAnimalMOVCap"];
		$UniMas = $row2["UniMas"];
		$UniFam = $row2["UniFam"];
	}
	if ($IdAnimalMOVCap)
	{
		$SQL2 = "SELECT TipusMOV, UniMas, UniFam 
				FROM AnimalMOVCap
				WHERE IdSoca =".$row["IdSoca"]."
				AND IdAnimalMOVCap > $IdAnimalMOVCap
				ORDER BY IdAnimalMOVCap ASC";
		$result2 = mysql_query($SQL2,$oConn);
	
	
		while ($row2 = mysql_fetch_array($result2))
		{
			switch($row2["TipusMOV"])
			{
				case 2:
				case 3:
						$UniMas = $UniMas + $row2["UniMas"];
						$UniFam = $UniFam + $row2["UniFam"];					
						break;
				case 4:
				case 5:
						$UniMas = $UniMas - $row2["UniMas"];
						$UniFam = $UniFam - $row2["UniFam"];					
						break;
			}
		}
	}
	if (($UniMas>0)||($UniFam>0))
	{
		
		
		$SQL2 = "SELECT NomSoca
				FROM Soca
				WHERE IdSoca = ".$row["IdSoca"];
		$result2 = mysql_query($SQL2,$oConn);
		
		while ($row2 = mysql_fetch_array($result2))
		{	
			if (($i % 2)==0)
			{
				$color = ' background:URL(img/Grid/LineaGridVerda.png)';
			}
			else
			{
				$color = '';	
			}
			$i++;
			
			$resultado = $resultado.'
			<tr onclick="AfegeixSocaAmbStock('.$row["IdSoca"].',\''.$_GET["form"].'\',\''.$row2["NomSoca"].'\','.$id.','.$UniMas.','.$UniFam.');">
				<td class="fuenteForm" height="25px" onclick=""  style="cursor:pointer; padding:5px;'.$color.' ">'.$row2["NomSoca"].'</td>
				<td class="fuenteForm" height="25px" style="cursor:pointer; padding:5px; '.$color.'">'.$UniMas.'</td>
				<td class="fuenteForm" height="25px" style="cursor:pointer; padding:5px; '.$color.'">'.$UniFam.'</td>				
			</tr>
		';
			
		}
	} 
	$UniMas = 0;
	$UniFam = 0;
}

$resultado = $resultado.'</table>';

mysql_close($oConn);

echo $resultado;

?>