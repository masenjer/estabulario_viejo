<?php
function CarregaDetallComanda8($id)
{
	return '
	<p>
		'.CarregaAnimalsComanda8($id).'
	</p>
	<p>
		'.CarregaJaulasComanda8($id).'	
	</p>
	<p>
		'.CarregaRecollida($id,"8").'
	</p>
	<p>
		'.CarregaDevolucio($id).'
	</p>
	<p>
		'.MostraCaixes($id).'
	</p>
	';
}

function CarregaAnimalsComanda8($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.RatonID, HC.Cantidad, HC.Estado, HC.IdJaulasAnimLin
			FROM JaulasAnimLin HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSoca AND Estado = 1 AND   HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '
		<div style="border:1px solid #9e9885">
		<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">	
			<tr style="background-color:#444; color:#FFF" align="left">
				<td colspan="4" style="background-color:#444; color:#FFF; border:none" align="left"><b>Animals</b></td>
			</tr>
			<tr style="background-color:#444; color:#FFF" align="left">
				<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Unitats</b></td>
				<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Espècie</b></td>
				<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Soca</b></td>
				<td style="background-color:#444; color:#FFF; border:none" align="left"><b>RatonID</b></td>
		
			</tr>';
		
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td class="GridLine'.$i.'">'.$row["RatonID"].'</td>
				</tr>
			';
			
			$i++;
		}		
	
		$resultado .= '</table></div>';
	}
	
	return $resultado;
}

function CarregaJaulasComanda8($id)
{
	include("../../rao/EstabulariForm_con.php");

	$SQL = "SELECT S.NomSoca, E.NomEspecie_ca, HC.Sala, HC.Posicion, HC.NumJaula, HC.Estado, HC.IdJaulasJaulaLin
			FROM JaulasJaulaLin HC, Soca S, Especie E 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = HC.IdSoca AND Estado = 1 AND  HC.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
			
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '
		<div style="border:1px solid #9e9885">
			<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">	
				<tr style="background-color:#444; color:#FFF" align="left">
					<td colspan="5" style="background-color:#444; color:#FFF; border:none" align="left"><b>G&agrave;bies</b></td>
				</tr>
				<tr style="background-color:#444; color:#FFF" align="left">
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Espècie</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Soca</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Sala</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>Posicio</b></td>
					<td style="background-color:#444; color:#FFF; border:none" align="left"><b>N&deg; de G&agrave;bia</b></td>
				</tr>';
		
		$i=0;
		
		while ($row = mysql_fetch_array($result))
		{
			$i%=2;
			$resultado .= '
				<tr>
					<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
					<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
					<td class="GridLine'.$i.'">'.$row["Sala"].'</td>
					<td class="GridLine'.$i.'">'.$row["Posicion"].'</td>
					<td class="GridLine'.$i.'">'.$row["NumJaula"].'</td>
				</tr>
			';
			$i++;
		}		
	
		$resultado .= '</table></div>';
	}
	
	return $resultado;
}

?>