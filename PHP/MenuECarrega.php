<?php
error_reporting (5); 
include("../rao/sas_con.php"); 

session_start();

$idCap = $_GET["n"];

$SQL = "SELECT Titol FROM CapMenu WHERE IdCapMenu = ".$idCap;
$result = mysql_query($SQL,$oConn);
while ($row = mysql_fetch_array($result))
{
	$TitolCap = $row["Titol"];
}

$SQL = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$idCap." AND IdLinMenuRel = 0  order by orden";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td height = "30px"></td>
	</tr>
	<tr valign="top">
		<td id="fuenteTitolML" width="5px" class="fuenteTitolML"></td>
		<td id="fuenteTitolML" align="left" valign="middle" height="35px" class="fuenteTitolML"> '.$TitolCap.' </td>
		<td id="fuenteTitolML" width="5px" class="fuenteTitolML" ></td>
	</tr>
	
</table>
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteML" id="fuenteML">';

while ($row = mysql_fetch_array($result))
{
	if ($_SESSION["Creacio"]=="1")
	{
		$DobleClic = 'ondblclick="EditaTitolLPage('.$row["IdLinMenu"].')"';	
	}
	if ($row["Tipus"] == 0)
	{
		$resultado = $resultado . '
	<tr>
		<td height="5px"></td>
	</tr>
	<tr>
		<td></td><td height="1px" bgcolor="#dddddd"></td><td></td>
	</tr>
		';	
	}
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="5px"><input type="hidden" id="tdMEAntic'.$row["IdLinMenu"].'" value="'.$row["Titol"].'"></td>';
		
	if ($row["Tipus"] == 1)
	{	
		$resultado = $resultado . '
		<td id="tdME'.$row["IdLinMenu"].'" onClick="MostraPage('.$row["IdLinMenu"].',1)" align="left" '.$DobleClic.'  height="25px" class="fuenteML">
			<div id="DIVTitolLPage'.$row["IdLinMenu"].'">'.$row["Titol"].'</div>
		</td>';
	}
	else
	{
		$resultado = $resultado . '
		<td id="tdME'.$row["IdLinMenu"].'" align="left" '.$DobleClic.'  height="35px" class="fuenteTitolML" valign="bottom">
			<div id="DIVTitolLPage'.$row["IdLinMenu"].'">'.$row["Titol"].'</div>
		</td>';
	}
		
	$resultado = $resultado . '<td width="5px"></td>';
		
	if ($_SESSION["Creacio"]=="1")
	{
		$resultado = $resultado . '<td align="right" width="42px">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td>
						<input type="text" style="width:15px; height:15px; vertical-align:middle;" id="OrdenME'.$row["IdLinMenu"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(5,event,'.$row["IdLinMenu"].')"><img id="ImageML" src="img/delete.jpg" onClick="MostraEliminaTOT(1,'.$idCap.','.$row["IdLinMenu"].');" style="width:20px; height:20px; vertical-align:middle;"  ></td>
				</tr>
			</table>			
		</td>
	</tr>';
	}

}

mysql_close($oConn);


		
if ($_SESSION["Creacio"]=="1")
{
	$resultado = $resultado . 
	'	<tr>
			<td height="8px"></td>
		</tr>
		<tr valign="bottom">
			<td colspan="5" align="right">
				<img id="ImageML" src="img/TitolButton.jpg" onClick="NovaLPageTitol('.$idCap.',0)" title="Nuevo T&iacute;tulo"><img id="ImageML" src="img/plus.jpg" onClick="NovaLPage('.$idCap.',0)" title="Nueva P&aacute;gina">
			</td>
		</tr>';
		
}

$resultado = $resultado . 
		'	
		<tr>
			<td height="20px"></td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF" colspan="4" id="OmbraInferiorMenus" class="OmbraInferiorMenus">
		</tr>

	</table>';
echo $resultado;
?>

