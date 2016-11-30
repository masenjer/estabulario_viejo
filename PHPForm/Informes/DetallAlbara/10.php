<?php
function CarregaDetallComanda10($id)
{
	return 
'<p>'.CarregaDadesCentre($id,'Dest&iacute;').'</p>'.
'<p>'.CarregaExpo($id).'</p>'.
'<p>'.MostraCaixes($id).'</p>';
}

function CarregaExpo($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT E.NomEspecie_ca, HC.Genotip, HC.Marcatge, HC.Iden, HC.Sala, HC.Sexo, HC.Cant, HC.FechaNac, S.NomSoca, HC.IdExpo, HC.Estado
			FROM Expo HC, Especie E, Soca S 
			WHERE E.IdEspecie = HC.IdEspecie AND S.IdSoca = HC.Soca AND Estado = 1 AND HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '<table width="100%" cellpadding="5px" cellspacing="0" border="0">
				<tr>
					<td colspan="8" align="center" style="background-color:#444; color:#FFF"><b>Animals a Exportar</b></td>
				</tr>
				<tr align="left" style="text-align:left;">
					<td class="CapcaGrid" style="width:40px">Esp&egrave;cie</td>
					<td class="CapcaGrid">Soca</td>
					<td class="CapcaGrid" style="width:30px">Genotip</td>					
					<td class="CapcaGrid" style="width:60px">Identificatiu</td>
					<td class="CapcaGrid" style="width:50px">Sala</td>
					<td class="CapcaGrid" style="width:40px">Sexe</td>
					<td class="CapcaGrid" style="width:40px">Uds</td>
					<td class="CapcaGrid" style="width:60px">Data Naixement / Arribada</td>
				</tr>';
		$i=0;
				
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			
			$sex = ($row["Sexo"]=="0")?"M":"F";

			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'" style="width:40px">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td width="60px" class="GridLine'.$i.'" style="width:60px">'.$row["Genotip"].'</td>
					<td class="GridLine'.$i.'" style="width:70px">'.$row["Iden"].'</td>
					<td class="GridLine'.$i.'" style="width:50px">'.$row["Sala"].'</td>
					<td class="GridLine'.$i.'" style="width:40px">'.$sex.'</td>
					<td class="GridLine'.$i.'" style="width:40px">'.$row["Cant"].'</td>
					<td class="GridLine'.$i.'" style="width:60px">'.SelectFecha($row["FechaNac"]).'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table>';
	}
	
	return $resultado;
}

?>