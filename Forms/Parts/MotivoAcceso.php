<?php 
function MostraMotivoAcceso($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left">Motiu pel qual ha d'accedir<font class="ast">*</font></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
	<tr>
    	<td>
        	<textarea id="TAMotivoAcceso<?php echo $form; ?>" style="width:100%"  class="inputForm"></textarea>
        </td>
    </tr>	
</table>
<?php
}
?>