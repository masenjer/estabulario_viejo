<?php
function MostraEntradaMaterialsDia($form)
{
?>	
<table cellspacing="0" cellpadding="2" border="0">
   	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="3">Dies pels quals es sol&middot;licita l'entrada i materials </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td>
        	<table>
            	<tr>
                    <td style="padding-left:5px;" width="140px" class="fuenteFormTitol">Data</td>
                    <td class="fuenteFormTitol">Materials</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
        	<table id="tablePA<?php echo $form;?>" border="0"></table>
        </td>
    </tr>
    <tr>
    	<td align="right" colspan="3"><input type="button" id="PlusEmButton" class="ButtonPlus" onclick="CreaFilaEntradaMateriales(1,'<?php echo $form; ?>');"/></td>
    </tr>
    </table>
<?php
}
?>