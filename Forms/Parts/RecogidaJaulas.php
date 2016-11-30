<?php 
function MostraRecogidaJaulas($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="4">Recollida d'Animals i/o G&agrave;bies (recordeu, es com&uacute; per a  tots els blocs)<font class="ast">*</font> </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
        <td class="fuenteFormTitol" align="left">Data</td>
        <td align="left"><input type="text" id="FechaRecogida<?php echo $form; ?>" class="fuenteForm" readonly="readonly" ></td>
        <td align="left">Hora</td>
        <td align="left"><select id="HoraRecogida<?php echo $form; ?>" class="fuenteForm">
                <?php CargaSelectHoras(); ?>
            </select>
        </td>
        <td>
            <input type="radio" name="Vivos<?php echo $form; ?>" id="Vivos<?php echo $form; ?>" value="1" onclick="InicialitzaRecollida('<?php echo $form; ?>');" />Vius
        </td>
        <td>
            <input type="radio" name="Vivos<?php echo $form; ?>" id="Vivos<?php echo $form; ?>" value="0" onclick="$('#DIVSacrificio<?php echo $form; ?>').show('slow');" />Morts
        </td>
    </tr>
    <tr>
        <td colspan="6" align="right">
            <div id="DIVSacrificio<?php echo $form; ?>" style="display:none;">
                M&egrave;tode de sacrifi 
                <select id="SacrificiRecogida<?php echo $form; ?>" class="fuenteForm">
                    <option value="0">-------------</option>
                    <option value="1">CO2</option>
                    <option value="2">Dislocaci&oacute; cervical</option>
                </select>
            </div>
        </td>
    </tr>

</table>
<?php
}
?>