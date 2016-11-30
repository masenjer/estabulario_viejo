<?php
function MostraCaixes($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT C.IdCaixa, C.Unidades, C.Menjar, M.NomMidaCaixa, T.NomTipusCaixa FROM Caixa C, MidaCaixa M, TipusCaixa T WHERE T.IdTipusCaixa = C.IdTipusCaixa AND M.IdMidaCaixa = C.IdMidaCaixa AND C.IdComandaCap = ".$id;
	$result = mysql_query($SQL,$oConn);

	$r='<table width="100%" cellpadding="5px" cellspacing="0" border="0" style="border:1px solid #9e9885">
			<tr>
				<td colspan="4" style="background-color:#444; color:#FFF"><b>Caixes</b></td>
				<td align="right" style="background-color:#444; color:#FFF"><input type="button" class="ButtonAdd24" onclick="MostraFitxaNewCaixes('.$id.');">
			</tr>
			<tr class="CapcaGrid">
				<td align="left">Unitats</td>
				<td align="left">Material</td> 
				<td align="left">Mida</td>
				<td align="left">Menjar</td>
				<td width="24px"></td>
			</tr>
';
	$i=0;
	while ($row = mysql_fetch_array($result))
	{
		switch ($row["Menjar"])
		{
			case "0": 	$Menjar = "No";
						break;
			case "1":	$Menjar = "S&iacute;"; 
						break;	
		}
		
		$i%=2;
		$r.='
			<tr>
				<td class="GridLine'.$i.'">'.$row["Unidades"].'</td>
				<td class="GridLine'.$i.'">'.$row["NomTipusCaixa"].'</td>
				<td class="GridLine'.$i.'">'.$row["NomMidaCaixa"].'</td>
				<td class="GridLine'.$i.'">'.$Menjar.'</td>
				<td class="GridLine'.$i.'">
					<button class="ButtonDelete24" onclick="DeleteCaixes('.$row["IdCaixa"].','.$id.')"/>
				</td>
			</tr>';
		$i++;
	}
	$r.='</table>';
	
	return $r;

}
?>