<?php 
function MostraDadesSolicitantEntrada($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">Dades de la persona que ha d'accedir<font class="ast">*</font></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td align="left">Nom i cognoms</td>
    	<td align="left"><input type="text" id="Nombre<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">NIF</td>
    	<td align="left"><input type="text" id="NIF<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">Tel&egrave;fon i/o extensi&oacute;</td>
    	<td align="left"><input type="text" id="Telefono<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">Email</td>
    	<td align="left"><input type="text" id="Email<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
<?php
if ($form == "AccesPuntual")
{		
?>
	<tr>
    	<td align="left">Centre / Empresa</td>
    	<td align="left"><input type="text" id="CentroEmpresa<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
<?php
}
?>
	<tr>
    	<td align="left">Tipus d'acreditaci&oacute; que poseeix</td>
    	<td align="left">
        	<input type="checkbox" id="TipoAcredit<?php echo $form; ?>0" name="TipoAcredit<?php echo $form; ?>0" value="1" onclick="SeleccionaTipusAcreditacio('<?php echo $form; ?>');" /> Personal per a atendre als animals<br />
        	<input type="checkbox" id="TipoAcredit<?php echo $form; ?>1" name="TipoAcredit<?php echo $form; ?>1" value="1" onclick="SeleccionaTipusAcreditacio('<?php echo $form; ?>');" /> Personal experimentador<br />
        	<input type="checkbox" id="TipoAcredit<?php echo $form; ?>2" name="TipoAcredit<?php echo $form; ?>2" value="1" onclick="SeleccionaTipusAcreditacio('<?php echo $form; ?>');" /> Personal investigador<br />
        	<input type="checkbox" id="TipoAcredit<?php echo $form; ?>3" name="TipoAcredit<?php echo $form; ?>3" value="1" onclick="DeseleccionaTipusAcreditacio('<?php echo $form; ?>');" /> No estic acreditat<br />
            
        </td>
    </tr>
</table>
<?php
}
?>