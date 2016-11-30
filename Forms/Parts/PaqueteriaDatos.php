<?php 
function MostraPaqueteriaDatos($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">Dades de la paqueteria que han de portar<font class="ast">*</font></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td align="left">Prove&iuml;dor</td>
    	<td align="left"><input type="text" id="Proveidor<?php echo $form; ?>" class="inputForm"  style="width:300px;"/></td>
    </tr>
    <tr>
    	<td align="left">Concepte</td>
    	<td align="left"><input type="text" id="Concepte<?php echo $form; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
	<tr>
    	<td align="left">Data d'arribada prevista </td>
    	<td align="left"><input type="text" id="Fecha<?php echo $form; ?>" class="fuenteForm" readonly="readonly" ></td>
    </tr>
	<tr>
    	<td align="left">Identificaci&oacute; (n&uacute;mero de comanda o similar)</td>
    	<td align="left"><input type="text" id="Ident<?php echo $form; ?>" class="inputForm" style="width:300px;" /></td>
    </tr>
	<tr>
    	<td align="left">Condicions d' emmagatzematge</td>
    	<td align="left">
        	<select id="Condicions<?php echo $form; ?>" class="inputForm" style="width:300px;" >
                <option value="">-------------------------</option>
                <option value="0">Temperatura ambient</option>
        		<option value="1">Refrigerac&oacute;: 5ºC</option>
        		<option value="2">Congelaci&oacute;: -20ºC</option>
        		<option value="3">Congelaci&oacute;: -80ºC</option>
        	</select>
        </td>
    </tr>
</table>
<?php
}
?>