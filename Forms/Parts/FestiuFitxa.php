
<?php	

function MostraFestiuFitxa()
{
?>
<table cellspacing="2" cellpadding="0" border="0">

	<tr>
    	
    	<td align="left">Data</td>
        <td align="left"><input type="text" id="FechaFestiu" class="fuenteForm" readonly="readonly" ></td>
    	<td><input type="button" id="UpdateFestiuButton" value="Guardar"  class="fuenteGestionNoticia" onclick="UpdateFestiu();"/></td>     	
    </tr>
</table>
<?php    
}
?>
