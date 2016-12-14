<?php 
function MostraRecogida($form)
{
    if ($form != "IntTecCruce"){
        $obligatori = '<font class="ast">*</font>';   
    }
    else $obligatori = "";

?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left">RECOLLIDA / UTILIZACI&Oacute; <br />(Recordeu, &eacute;s com&uacute; per a tots els blocs)<?php echo $obligatori ?></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td>
        	<div id="FranjaHoria<?php echo $form; ?>">
           		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="fuenteForm">
                	<tr>
                    	<td align="left">Data</td>
                    	<td align="left"><input type="text" id="FechaRecogida<?php echo $form; ?>" class="fuenteForm" readonly="readonly" ></td>
                        <td align="left">Hora</td>
                        <td align="left"><select id="HoraRecogida<?php echo $form; ?>" class="fuenteForm">
                        		<?php CargaSelectHoras(); ?>
                        	</select>
                        </td>
                        <?php
							//if ($form == "IntTecHormoyCruce")
							//{
								VivosMuertos($form);
							//}
						?> 
                    </tr>  
                    <?php
						//if ($form == "IntTecHormoyCruce")
						//{
					?>
                    <tr>
                    	<td colspan="5" align="right">
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
                    <?php			
								
						//}
						if ($form != "PetHemAc")
						{
					?> 
                    <tr>
                    	<td colspan="5" align="left">
                        	<input type="radio" id="RecogidaRadio<?php echo $form; ?>" name="RecogidaRadio<?php echo $form; ?>" value="1" />Aquests animals seran recollits del Servei d' Estabulari
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="5" align="left">
                        	<input type="radio" id="RecogidaRadio<?php echo $form; ?>" name="RecogidaRadio<?php echo $form; ?>" value="2" />Aquests animals seran emprats al Servei d' Estabulari
                        </td>
                    </tr>
                    <?php
						}
					?>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php
}

function VivosMuertos($form)
{
?>
	<td>
    	<input type="radio" name="Vivos<?php echo $form; ?>" id="Vivos<?php echo $form; ?>" value="1" onclick="InicialitzaRecollida('<?php echo $form; ?>');" />Vius
    	<input type="radio" name="Vivos<?php echo $form; ?>" id="Vivos<?php echo $form; ?>" value="0" onclick="$('#DIVSacrificio<?php echo $form; ?>').show('slow');" />Morts
    </td>
<?php	
}
?>