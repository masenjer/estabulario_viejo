<?php
include("../rao/sas_con.php");

session_start();

$cuenta = 1;

$SQL = "SELECT * FROM CapMenu order by Orden";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="FonsMenuSupInterButtonGris">
<tr>
<td>
<table id="FonsMenuSupInterButtonGris" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
		<td width="12px"></td>
		<td id="RayaGris" width="1px">
			';

while ($row = mysql_fetch_array($result))
{
	 $cuenta ++;
 
	if ($_SESSION["Creacio"]=="1")
	{
		$DobleClic = 'ondblclick="EditaTitolMS('.$row["IdCapMenu"].')"';	
		
		$delete = '<td><input type="text" style="width:19px;vertical-align:middle; height: 19px;" id="OrdenMS'.$row["IdCapMenu"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(6,event,'.$row["IdCapMenu"].')"><img id="ImageMS" src="img/delete.jpg" onClick="MostraEliminaTOT(0,'.$row["IdCapMenu"].');"  style="vertical-align:middle; height: 24px;"></td>';
		$stilo = 'style="background-image:URL(img/CapcaRelleu2.png);"';
	}
	else
	{
		$stilo = 'style="background-image:URL(img/CapcaRelleu2.png);"';	
	}

	$resultado = $resultado . '
		<td bgcolor="#333333" class="fuenteMS" '.$stilo.'  height="28px" id="tdMS'.$row["IdCapMenu"].'" onClick="CanviaCPage('.$row["IdCapMenu"].');" align="left" '.$DobleClic.'>
			<input type="hidden" id="tdMSAntic'.$row["IdCapMenu"].'" value="'.$row["Titol"].'">
			<div id="DIVTitolMS'.$row["IdCapMenu"].'" class="DIVMenuS">'.$row["Titol"].'</div></td>
		
		'.$delete.'
		<td width="2px"></td>
';
}
mysql_close($oConn);


		
if ($_SESSION["Creacio"]=="1")
{
	$add = 	'
			
			<td colspan="2" align="right">
				<img class="ImageMS" src="img/plus.jpg" onClick="NovaMS()">
			</td>
					';
			
	$GU = '';
		
}
else
{
	$GU = ' <div id="DIVGUMenu">
				<input type="button" id="ButtonAccesUsuaris" value="Acc&eacute;s d\'usuaris" onclick="ObreLoginUsers();">
			</div>';	
}
	$resultado = $resultado . 
			'<td width="12px" style="padding-right:2px" align="right">
				<div id="DIVBotoGU">
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							'.$add.'
						    	
							<td><img class="ImageMS" src="img/GU.jpg" onclick="MostraGestioGU();"/></td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
	<td align="right" >'.$GU.'</td><td width="15px"></td><tr></table>	
	<input type="hidden" id="CuentaMS" value="'.$cuenta.'">';


echo $resultado;
?>

