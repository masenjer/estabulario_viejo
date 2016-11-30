<?php
function InfoData02($fecha){

	$resultado = '<p>Petici&oacute; de Femelles Acoblades</p>';
	
	$resultado1 = Cruce02($fecha);
	$resultado2 = Recollida02($fecha);
	
	if($resultado1||$resultado2) 
		return $resultado.$resultado1.$resultado2;	
}
	


function Cruce02($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado= '

<p>Encreuaments</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">

	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
	</tr>
';
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.IdComandaCap 
			FROM PetHemAc PP, Especie E, Soca S 
			WHERE E.IdEspecie = S.IdEspecie AND S.IdSoca = PP.IdSoca AND PP.Fecha = '".$fecha."' AND PP.Estado = 1"; 
	$result = mysql_query($SQL,$oConn);
	
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		

		$i%=2;
				
			$resultado .= '
			<tr>
				<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
				<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
				<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
				<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			</tr>';
		$i++;
		$buit++;
		
		
	}
	$resultado .= '
	</table>';
	
	return $resultado;
}

function Recollida02($fecha)
{
	include("../../rao/EstabulariForm_con.php");

	$buit = 0;

	$resultado= '

<p>Recollida</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Hora</b></td>
		<td class="CapcaGrid"><b>Tipus</b></td>
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Unitats</b></td>
		<td class="CapcaGrid"><b>Esp&egrave;cie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Data Naixement / Arribada</b></td>
	</tr>
';
			
	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca , PP.Cantidad, PP.Fecha, PP.Estado, PP.IdPetHemAc, R.Hora, PP.IdComandaCap 
			FROM PetHemAc PP, Especie E, Soca S, Recollida R 
			WHERE 
						E.IdEspecie = S.IdEspecie 
			AND 		S.IdSoca = PP.IdSoca 			
			AND 		R.IdComandaCap = PP.IdComandaCap
			AND 		R.Fecha = '".$fecha."'
			AND 		PP.Estado = 1
			ORDER BY	R.Hora, PP.IdComandaCap ASC
			"; 
	$result = mysql_query($SQL,$oConn);
	
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		
		if ($row["Tipus"] == 1) $tipus = " Recollits";
		else $tipus = "Emprats";

		$i%=2;
				
		if ($row["Estado"]=="1" )
		{
			$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["Hora"].'</td>
			<td class="GridLine'.$i.'">'.$tipus.'</td>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["Cantidad"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
		</tr>
	';
		$i++;
		$buit++;
		}
		
	}
	$resultado .= '
	</table>';
	
	return $resultado;
}
?>