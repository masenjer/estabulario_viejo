<?php
function CarregaDetallComanda1($id,$IdProc)
{
	echo '
<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">
	<tr class="CapcaGrid" align="left" style="text-align:left;">
		<td><b>Unitats</b></td>
		<td><b>Espècie</b></td>
		<td><b>Soca</b></td>
		<td><b>NProc</b></td>
		<td><b>Data Naixement / Arribada</b></td>
		<td><b>Sexe</b></td>
		<td><b>Estat</b></td>
	</tr>
		'.CarregaPetAnimProd($id,$IdProc).'
</table><br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom:20px;">'.CarregaRecollida($id,"0").'</td>
	</tr>
	<tr>
		<td>'.MostraCaixes($id).'</td>
	</tr>
</table>';	
}

function CarregaPetAnimProd($id,$IdProc)
{
	include("../../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT PP.IdPetAnimProd,E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.FechaNac, PP.Sexo, PP.Estado, S.IdSoca, P.NumProc 
			FROM PetAnimProd PP, Especie E, Soca S, Procediment P  
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = PP.IdSoca AND PP.IdProcediment = P.IdProcediment AND PP.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$i = 0;
	
	$resultado = '';
	while ($row = mysql_fetch_array($result))
	{
		
		$i%=2;
		
		switch ($row["Sexo"])
		{
			case "M": 	$sex="Mascle";
						break;
			case "F":	$sex="Femella";	
						break;
			default: 	$sex="Indiferent";
						break;
		}
		
		$resultado .= '
	<tr>
		<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
		<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
		<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
		<td class="GridLine'.$i.'">'.$row["NumProc"].'</td>
		<td class="GridLine'.$i.'">'.SelectFecha($row["FechaNac"]).'</td>
		<td class="GridLine'.$i.'">'.$sex.'</td>
		<td class="GridLine'.$i.'">'.CarregaSelectReservaPetaAnimProd($row["IdPetAnimProd"],$row["Estado"],$row["Sexo"],$row["Cantidad"],$row["IdSoca"],$row["FechaNac"],$IdProc).'</td>
	</tr>
';
		if ($sex=="Indiferent")
		{
			$SQL2 = "SELECT * FROM PetAnimProdSub WHERE IdPetAnimProd =". $row["IdPetAnimProd"];
			$result2 = mysql_query($SQL2,$oConn);
			
			//echo $SQL2;
			while ($row2 = mysql_fetch_array($result2))
			{
				$resultado .= '
						<tr>
							<td align="right">'.$row2["Mascles"].'</td>
							<td colspan="5" align="left">Mascles</td>
						</tr>				
						<tr>
							<td align="right">'.$row2["Femelles"].'</td>
							<td colspan="5" align="left">Femelles</td>
						</tr>				
				';
			}
		}
		
		$i++;
	}
	
	
	return $resultado;
}


function CarregaSelectReservaPetaAnimProd($id,$num,$sex,$cant,$idSoca, $f,$IdProc)
{
	if ($sex == "-")  $accion = 'DefineixUnitatsPetAnimProd('.$id.')';
	else $accion = 'GuardaEstatPetAnimProd('.$id.','.$IdProc.','.$num.')';
	
	$color = array("#ffd789","#adff89","#ff8989");
	
	$cadena = array("En tramit","S'accepta", "Es denega");
	$resultado = '<select id="EstatPetAnimProd'.$id.'" disabled="disabled" class="fuenteForm" style="background-color:'.$color[$num].'">';
	for ($i=0;$i<3;$i++)
	{
		
		if ($i	== $num) $select = ' selected="selected" ';
		else $select = "";
		
		if ((($i==0)&&($num == 0))||($i!=0))
		$resultado .= '<option value="'.$i.'" '.$select.'  onclick="'.$accion.'" style="background-color:'.$color[$i].'">'.$cadena[$i].'</option>';
	}
	return $resultado .'</select>';
}

?>