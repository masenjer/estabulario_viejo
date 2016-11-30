<?php
error_reporting (5); 
include("../rao/sas_con.php"); 

session_start();

$idCap = $_GET["id"];

$SQL = "SELECT * FROM LinMD  where IdCapMenu =".$idCap." ORDER BY Orden";
$result = mysql_query($SQL,$oConn);

$resultado = '
<table>
	<tr>
		<td height="30px" bgcolor="#FFFFFF"></td>
	</tr>		
</table>
<table width="100%"  cellpadding="0" cellspacing="0" border="0" >';

while ($row = mysql_fetch_array($result))
{
	if ($_SESSION["Creacio"]=="1")
	{
		$DobleClic1 = 'ondblclick="EditaTitolLinMD('.$row["IdLinMD"].')"';	
		$DobleClic2 = 'ondblclick="EditaDescripcioLinMD('.$row["IdLinMD"].')"';	
	}
	
	$resultado = $resultado . '
	<tr>
		<td colspan="5" height="1px" bgcolor="#e6e6e6"></td>
	</tr>
	<tr valign="top">
		<td width="1px" bgcolor="#e6e6e6"></td>
		<td width="5px" class="fuenteTitolMD"><input type="hidden" id="tdLinMDAntic'.$row["IdLinMD"].'" value="'.$row["Titol"].'"></td>
		<td height="20px" valign="middle" id="tdLinMD'.$row["IdLinMD"].'" onClick="MostraPage('.$row["IdLinMD"].',2)" align="left" '.$DobleClic1.' class="fuenteTitolMD" colspan="2" >
			<table cellpadding="5">
				<tr>
					<td><div id="DIVTitolLinMD'.$row["IdLinMD"].'">'.$row["Titol"].'</div> </td>
				</tr>
			</table>
		</td>	
		<td width="5px" class="fuenteTitolMD"></td>
		<td width="1px" bgcolor="#e6e6e6"></td>
	</tr>
	<tr>
		<td colspan="6" height="1px" bgcolor="#e6e6e6"></td>
	<tr>
	<tr>
	</tr>
	<tr valign="middle">
		<td height="35px" width="1px" bgcolor="#e6e6e6"></td>
		<td class="fuenteMD" width="5px"><input type="hidden" id="tdLinDesMDAntic'.$row["IdLinMD"].'" value="'.$row["Descripcio"].'"></td>
		<td class="fuenteMD" id="tdLinDesMD'.$row["IdLinMD"].'" align="left" '.$DobleClic2.'  height="25px">
			<table cellpadding="5">
				<tr>
					<td><div id="DIVDescripcioLinMD'.$row["IdLinMD"].'">'.$row["Descripcio"].'</div></td>
				</tr>
			</table>
		</td>	
		<td class="fuenteMD" width="5px"></td>
		';
		
	if ($_SESSION["Creacio"]=="1")
	{
		$resultado = $resultado . '
			
					<td class="FondoMD" bgcolor="#f3f3f3">
						<img id="ImageMD" src="img/delete.jpg" onClick="MostraEliminaTOT(2,1,'.$row["IdLinMD"].');"><br><input type="text" style="width:30px;vertical-align:middle; height: 19px;" id="OrdenMD'.$row["IdLinMD"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(7,event,'.$row["IdLinMD"].')">				
					</td>';	
	}
	else $resultado = $resultado . '<td class="fuenteMD"></td>';
	
	$resultado = $resultado.'<td width="1px" bgcolor="#e6e6e6"></td></tr>
		<tr>
			<td colspan="6" id="OmbraInferiorMenus" class="OmbraInferiorMenus">
		</tr>
				<tr>
			<td height="5px"></td>
		</tr>';

}

mysql_close($oConn);


		
if ($_SESSION["Creacio"]=="1")
{
	$resultado = $resultado . 
	'
		<tr valign="bottom">
			<td colspan="6" align="right">
				<img id="ImageMD" src="img/plus.jpg" onClick="NovaLinMD('.$idCap.');">
			</td>
		</tr>';
		
}

$resultado = $resultado . 
		'
			
		
	</table>';
echo $resultado;
?>

