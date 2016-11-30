<?php 
function MostraContactoAnimales($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">Contacte amb altres animals<font class="ast">*</font></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td align="left" width="200px"><input type="checkbox" id="ContactoAnimales0<?php echo $form; ?>" onclick="AnulaContactoAnimales('<?php echo $form; ?>');" />No</td>
    	<td align="left"></td>
    </tr>
	<tr>
    	<td align="left"><input type="checkbox" id="ContactoAnimales1<?php echo $form; ?>" onclick="MostraamagaDIVContacto(1,'<?php echo $form; ?>');" />S&iacute;, amb mascotes</td>
    	<td align="left">
        <div id="DIVContacto1<?php echo $form; ?>" style="display:none;">
        	Esp&egrave;cie/s: <textarea id="ContactoTA1<?php echo $form; ?>" class="inputForm" style="width:100%"></textarea><br />
            Data &uacute;ltim contacte 
        	<input type="text" id="FechaContacto1<?php echo $form; ?>" class="fuenteForm" style="width:100px" readonly="readonly" />
        </div>
        </td>
    </tr>
	<tr>
    	<td align="left"><input type="checkbox" id="ContactoAnimales2<?php echo $form; ?>" onclick="MostraamagaDIVContacto(2,'<?php echo $form; ?>');" />S&iacute;, amb animals d'experimentaci&oacute;</td>
    	<td align="left">        
        <div id="DIVContacto2<?php echo $form; ?>" style="display:none;">
        	Esp&egrave;cie/s: <textarea id="ContactoTA2<?php echo $form; ?>" class="inputForm" style="width:100%"></textarea><br />
            Data &uacute;ltim contacte 
        	<input type="text" id="FechaContacto2<?php echo $form; ?>" class="fuenteForm" style="width:100px" readonly="readonly" />
        </div>
        </td>
    </tr>
	<tr>
    	<td align="left"><input type="checkbox" id="ContactoAnimales3<?php echo $form; ?>" onclick="MostraamagaDIVContacto(3,'<?php echo $form; ?>');" />S&iacute;, amb animals salvatges</td>
    	<td align="left">
        <div id="DIVContacto3<?php echo $form; ?>" style="display:none;">
        	Esp&egrave;cie/s: <textarea id="ContactoTA3<?php echo $form; ?>" class="inputForm" style="width:100%"></textarea><br />
            Data &uacute;ltim contacte 
        	<input type="text" id="FechaContacto3<?php echo $form; ?>" class="fuenteForm" style="width:100px" readonly="readonly" />
        </div>
        </td>
    </tr>
	<tr>
    	<td align="left"><input type="checkbox" id="ContactoAnimales4<?php echo $form; ?>" onclick="MostraamagaDIVContacto(4,'<?php echo $form; ?>');" />Altres possibles situacions de risc</td>
    	<td align="left">
        <div id="DIVContacto4<?php echo $form; ?>" style="display:none;">
        	Especificar: <textarea id="ContactoTA4<?php echo $form; ?>" class="inputForm" style="width:100%"></textarea>
        </div>
        </td>
    </tr>
</table>
<?php
}
?>