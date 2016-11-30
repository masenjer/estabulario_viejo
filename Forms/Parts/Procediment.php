<?php 
function MostraProcediment($form)
{
?>
<table >
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">Dades del procediment</td>
    </tr>
<?php /*?>
    <tr>
    	<td align="left">NIU Investigador/a responsable (este dato se usar&aacute; para relaciones de peticiones)</td>
    	<td align="left"><input type="text" id="NIUInves<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
<?php */?>    
	<tr>
    	<td align="left">Investigador/a responsable<font class="ast">*</font></td>
    	<td align="left"><select id="Inves<?php echo $form; ?>" class="inputForm" /></select></td>
    	<!--<td align="left"><input type="text" id="Inves<?php echo $form; ?>" class="inputForm" /></td>-->
    </tr>
	<tr>
    	<td align="left">Animal assignat<font class="ast">*</font></td>
    	<td align="left"><select id="Especie0<?php echo $form; ?>" class="inputForm" /></select></td>
    </tr>
	<tr>
    	<td align="left">N&deg; procediment atorgat per la CEEAH de la UAB<font class="ast">*</font></td>
    	<td align="left"><input type="text" id="NProc<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">N&deg; d' ordre atorgat per la Generalitat de Catalunya</td>
    	<td align="left"><input type="text" id="NOrden<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">Estat del procediment</td>
    	<td align="left">
        	<select id="EstatProc<?php echo $form; ?>" class="inputForm" >
            	<option value="0">Nou</option>
            	<option value="1">Renovat</option>
            	<option value="2">Modificat</option>
            	<option value="3">Caducat</option>
            </select>        	       
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right"><input type="button" value="Guardar" onclick="UpdateProc();" /></td>
    </tr>
</table>
<?php
}
?>