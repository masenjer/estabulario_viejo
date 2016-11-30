<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");

$t = $_GET["t"];

if ($t!="3") $filte = " WHERE Actiu = ".$t;		


$titol = array("Dietes","Ja&ccedil;os","Caixes de Transport","F&agrave;rmacs","Desinfectants","Fungibles");
$taula = array("Dieta","Lecho","CajaTrans","Farmac","Desinfectante","Fungible");

echo '<table width="100%" cellpadding="0" cellspacing="22" border="0">';
for ($i=0;$i<6;$i++)
{
	if (($i==0)||($i==3)) echo '<tr valign="top">';
	
	echo '<td>'; 

	//
	echo '	
	
	<table width="250px" id="TableCapAssignatures" cellpadding="0" cellspacing="0" style="border:1px solid #9e9885"">
	  	<tr class="CapcaGrid" valign="bottom">
			<td class="CapcaGrid" style="padding-left:10px; padding-right:10px;"> 
				  '.$titol[$i].'
			</td>
			<td width="23px" class="CapcaGrid"><input type="button" class="ButtonAdd24" onclick="CarregaFitxaConsumible(\'\',\''.$taula[$i].'\');" title="Nou Consumible o centre gestor" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<div id="DIVNouConsumible'.$taula[$i].'" style="display:none;">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>Consumible:</td>
							<td><input type="text" id="TConsumible'.$taula[$i].'" class="fuenteForm" style="width:141px;"></td>
							<td align="right"><input type="button" id="ButtonSaveConsumible" class="ButtonSave24" onclick="UpdateConsumible(\'\',\''.$taula[$i].'\');"></td>
					</table>
				</div>			
			</td>
		</tr>
	  </tr>
	';
	 
	
	$SQL = "SELECT * FROM ".$taula[$i]. $filte." Order by Nom".$taula[$i]."  ASC";
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$aux = $row["Actiu"] + 6;
	  echo'
		<tr  class="GridLine'.$aux.'">
			<td colspan="2">
				
				<table width="100%" cellpadding="0px" cellspacing="0" border="0">
					<tr>
						<td style="cursor:pointer;" onclick="CanviaVisibilitatConsumible('.$row["Id".$taula[$i]].',\''.$taula[$i].'\','.$row["Actiu"].');"><div id="DIVLabelConsumible'.$row["Id".$taula[$i]].$taula[$i].'" style="padding-top:3px;padding-bottom:3px;">'.$row["Nom".$taula[$i]].'</div></td>
						<td>
							<div id="DIVEditConsumible'.$row["Id".$taula[$i]].$taula[$i].'" style = "display:none">
								<input type="text" id="TConsumible'.$row["Id".$taula[$i]].$taula[$i].'" class="fuenteForm" style="width:141px;" value = "'.$row["Nom".$taula[$i]].'">
							</div>
						</td>
						<td align="right"><input type="button" id="ButtonSaveConsumible'.$row["Id".$taula[$i]].$taula[$i].'" class="ButtonSave24" onclick="UpdateConsumible('.$row["Id".$taula[$i]].',\''.$taula[$i].'\');" style="display:none;"></td>
						<td align="right" width="24px"><input type="button" id="ButtonEditConsumible" class="ButtonEdit24" onclick="CarregaFitxaConsumible('.$row["Id".$taula[$i]].',\''.$taula[$i].'\');"></td>						
				</table>
			</td>
		</tr>';
	  
	}
	echo '<tr><td height="100%"></td></tr></table>'; 
	
	echo '</td>';
	if (($i==2)||($i==5)) echo '</tr>';
}

echo '</table>';
?>