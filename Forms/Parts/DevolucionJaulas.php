<?php 
function MostraDevolucionJaulas($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="2">Devoluci&oacute; d'Animals i/o G&agrave;bies (recordeu, es com&uacute; per a tots els blocs)<font class="ast">*</font> </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td>
        	<input type="radio" name="RadioDevJaula<?php echo $form; ?>" value="0" onclick="$('#DIVDevJaulas<?php echo $form; ?>').hide(1000);" checked="checked"  />No
        	<input type="radio" name="RadioDevJaula<?php echo $form; ?>" value="1" onclick="$('#DIVDevJaulas<?php echo $form; ?>').show(1000);" />S&iacute;
        </td>
        <td>
        	<div id="DIVDevJaulas<?php echo $form; ?>" style="display:none;">
            	<table>
                	<tr>
                        <td class="fuenteFormTitol" align="left">Data</td>
                        <td align="left"><input type="text" id="FechaDev<?php echo $form; ?>" class="fuenteForm" readonly="readonly" ></td>
                        <td align="left">Hora</td>
                        <td align="left"><select id="HoraDev<?php echo $form; ?>" class="fuenteForm">
                                <?php CargaSelectHoras(); ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php
}
?>