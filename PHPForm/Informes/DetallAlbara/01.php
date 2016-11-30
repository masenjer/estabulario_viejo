<?php
function CarregaDetallComanda1($id,$IdProc)
{
	return '
	<b>Petici&oacute; d\' animals produ&iuml;ts al Servei d\' Estabulari </b><br><br>
<div style="border:1px solid #9e9885">
<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">
	<tr style="background-color:#444; color:#FFF" align="left">
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Unitats</b></td>
		<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Espècie</b></td>
		<td style="background-color:#444; color:#FFF; border:none"><b>Soca</b></td>
		<td style="background-color:#444; color:#FFF; border:none"><b>NProc</b></td>
		<td style="background-color:#444; color:#FFF; border:none"><b>Data Naixement / Arribada</b></td>
		<td style="background-color:#444; color:#FFF; border:none"><b>Sexe</b></td>
	</tr>
		'.CarregaPetAnimProd($id,$IdProc).'
</table>
</div><br><br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>'.MostraCaixes($id).'</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>
	<tr>
		<td style="padding-bottom:20px; padding-top:50px">'.CarregaRecollida($id,"1").'</td>
	</tr>
</table>';	
}

function CarregaPetAnimProd($id,$IdProc)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT PP.IdPetAnimProd, E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.FechaNac, PP.Sexo, PP.Estado, S.IdSoca, P.NumProc 
			FROM PetAnimProd PP, Especie E, Soca S, Procediment P  
			WHERE PP.Estado = 1 AND E.IdEspecie = S.IdEspecie AND S.IdSoca = PP.IdSoca AND PP.IdProcediment = P.IdProcediment AND PP.IdComandaCap = ".$id; 
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
		
		if ($row["Estado"]=="1" )
		{	
			$resultado .= '
		<tr>
			<td>'.$row["Cantidad"].'</td>
			<td>'.$row["NomEspecie_ca"].'</td>
			<td>'.$row["NomSoca"].'</td>
			<td>'.$row["NumProc"].'</td>
			<td>'.SelectFecha($row["FechaNac"]).'</td>
			<td>'.$sex.'</td>
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
	}
	
	
	return $resultado;
}

?>