<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];

$SQL = "SELECT IdProjecte, Projecte, Actiu 
		FROM Projecte 
		WHERE IdInvestigador = ".$id." 
		ORDER BY Projecte ASC 
";
$result = mysql_query($SQL,$oConn);

$resultado = '
	<table width="250px" cellpadding="0" cellspacing="0" border="0">
		<tr class="CapGrid">
			<td height="27px" class="CapcaGrid">&nbsp;&nbsp;&nbsp;Projectes assignats</td>
			<td width="23px" class="CapcaGrid"><input type="button" class="ButtonAdd24" onclick="CarregaFitxaProjecte('.$id.',\'\');" title="Nou projecte o centre gestor" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<div id="DIVNouProjecte" style="display:none;">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>Projecte:</td>
							<td><input type="text" id="TInvesProjecte" class="fuenteForm" style="width:141px;"></td>
							<td align="right"><input type="button" id="ButtonSaveInvesProjecte" class="ButtonSave24" onclick="UpdateInvesProjecte('.$id.',\'\');"></td>
					</table>
				</div>			
			</td>
		</tr>';


while ($row = mysql_fetch_array($result))
{
	$aux = $row["Actiu"] + 6;
	
	$resultado = $resultado.'
		<tr  class="GridLine'.$aux.'">
			<td colspan="2">
				<table width="100%" cellpadding="0px" cellspacing="0" border="0">
					<tr>
						<td style="cursor:pointer;" onclick="CanviaVisibilitatInvesProjecte('.$row["IdProjecte"].','.$row["Actiu"].')"><div id="DIVLabelProjecte'.$row["IdProjecte"].'">'.$row["Projecte"].'</div></td>
						<td>
							<div id="DIVEditProjecte'.$row["IdProjecte"].'" style = "display:none">
								<input type="text" id="TInvesProjecte'.$row["IdProjecte"].'" class="fuenteForm" style="width:141px;" value = "'.$row["Projecte"].'">
							</div>
						</td>
						<td align="right"><input type="button" id="ButtonEditInvesProjecte'.$row["IdProjecte"].'" class="ButtonSave24" onclick="UpdateInvesProjecte('.$id.',\''.$row["IdProjecte"].'\');" style="display:none;"></td>
						<td align="right" width="24px"><input type="button" id="ButtonEditInvesProjecte" class="ButtonEdit24" onclick="CarregaFitxaProjecte('.$id.',\''.$row["IdProjecte"].'\');"></td>						
				</table>
			</td>
		</tr>
	';
}

$resultado = $resultado.'
	</table>
	';

mysql_close($oConn);

//echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id;
echo $resultado;

?>