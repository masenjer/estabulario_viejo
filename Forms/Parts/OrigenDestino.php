<?php 
function MostraOrigenDestino($valor)
{
	$c = explode("|",$valor);
	$c[0] = $c[0];
	$op = $c[1];

?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">Dades <?php echo $c[1]; ?> dels animals<font class="ast">*</font></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td align="left">Nom del centre</td>
    	<td align="left"><input type="text" id="NomCentre<?php echo $c[0]; ?>" class="inputForm"  style="width:300px;"/></td>
    </tr>
    <tr>
    	<td align="left">Adre&ccedil;a del centre</td>
    	<td align="left"><input type="text" id="DirCentre<?php echo $c[0]; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
	<tr>
    	<td align="left">Pa&iacute;s <?php echo $c[1]; ?></td>
    	<td align="left"><input type="text" id="PaisCentre<?php echo $c[0]; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
	<tr>
    	<td align="left">Nom persona de contacte</td>
    	<td align="left"><input type="text" id="PersCentre<?php echo $c[0]; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
	<tr>
    	<td align="left">Tel&egrave;fon de contacte</td>
    	<td align="left"><input type="text" id="TelCentre<?php echo $c[0]; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
	<tr>
    	<td align="left">Ade&ccedil;a electr&ograve;nica</td>
    	<td align="left"><input type="text" id="EmailCentre<?php echo $c[0]; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
<?php 
if ($c[0] == "Expo")
{
?>   
	<tr>
    	<td align="left">N&deg; Registre Centre <?php echo $c[1]; ?></td>
    	<td align="left"><input type="text" id="NReg<?php echo $c[0]; ?>" class="inputForm" /></td>
    </tr>
<?php
}
?>
</table>
<?php
}
?>