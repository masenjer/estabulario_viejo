<?php
function InfoData11($fecha)
{
include("../../rao/EstabulariForm_con.php");

$buit = 0;

$resultado = '
<p>Sol&middot;licitud d\'espai per allotjament d\'animals</p>

<table width="100%" cellpadding="5px" cellspacing="0" border="0">
	<tr align="left" style="text-align:left;">
		<td class="CapcaGrid"><b>Comanda</b></td>
		<td class="CapcaGrid"><b>Proveidor</b></td>
		<td class="CapcaGrid"><b>Especie</b></td>
		<td class="CapcaGrid"><b>Soca</b></td>
		<td class="CapcaGrid"><b>Sexe</b></td>
		<td class="CapcaGrid"><b>Edat/Pes</b></td>
		<td class="CapcaGrid"><b>n&deg; Animals</b></td>
		<td class="CapcaGrid"><b>Anim/Gabia</b></td>
	</tr>
';

	$SQL = "SELECT E.NomEspecie_ca, S.NomSoca, EA.Sexo, EA.Cant, EA.EP, EA.UEP, EA.AJ, EA.Estado, EA.IdEspaiAnimals, CC.IdComandaCap, PR.NomProveidor
			FROM EspaiAnimals EA
			
			INNER JOIN (Soca S 
				INNER JOIN Especie E 
				ON E.IdEspecie = S.IdEspecie)
			ON S.IdSoca = EA.IdSoca 
			
			INNER JOIN (Procedencia P
				INNER JOIN Proveidor PR
				ON PR.IdProveidor = P.IdCentre)
			ON P.IdComandaCap = EA.IdComandaCap 
			
			INNER JOIN ComandaCap CC 
			ON CC.IdComandaCap = EA.IdComandaCap
							 
			WHERE  
			EA.Estado = 1 
			AND P.Fecha = '".$fecha."'"; 

	$result = mysql_query($SQL,$oConn);

	$i = 0;
		
	while ($row = mysql_fetch_array($result))
	{
		$i%=2;

		$EUP = SelectSetGramsDies($row["EUP"]);

		if ($row["Sexo"] == "0") $Sexo = "Mascles";
		else $Sexo = "Femelles";
		
		$resultado .= '
		<tr>
			<td class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomProveidor"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomEspecie_ca"].'</td>
			<td class="GridLine'.$i.'">'.$row["NomSoca"].'</td>
			<td class="GridLine'.$i.'">'.$Sexo.'</td>
			<td class="GridLine'.$i.'">'.$row["EP"].' '.$EUP.'</td>
			<td class="GridLine'.$i.'">'.$row["Cant"].'</td>
			<td class="GridLine'.$i.'">'.$row["AJ"].'</td>
		</tr>
		';	
		$i++;
		$buit++;
	}
	if ($buit>0) return '</table>'.$resultado;	
	
}
?>