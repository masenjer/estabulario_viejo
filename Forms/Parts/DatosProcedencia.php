<?php
function MostraDatosProcedencia($form)
{
?>	
<table id="tableAnimales<?php echo $form;?>" cellspacing="0" cellpadding="2" border="0">
   	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="4">
			 Dades de proced&egrave;ncia
        </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
        <tr>
			<td align="left">Proced&egrave;ncia dels animals</td>
            <td align="left"><select id="Procedencia<?php echo $form; ?>" class="fuenteForm">
            	</select>
            </td>        
        	<td align="left">Data d' arribada</td>
            <td align="left" width="110px"><input type="text" id="FechaLlegada<?php echo $form; ?>" class="fuenteForm" style="width:80px" readonly="readonly" /></td>
        </tr>
    </table>
<?php
}
?>