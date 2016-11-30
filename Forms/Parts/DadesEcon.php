<?php 
function MostraDadesEcon($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">Dades econ&ograve;miques</td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td align="left">Responsable del Centre Gestor o Projecte<font class="ast">*</font></td>
    	<td align="left"><input type="text" id="RespCost<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">Centre Gestor o Projecte<font class="ast">*</font></td>
    	<td align="left"><input type="text" id="CentreCost<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
	<tr>
    	<td align="left">Reserva de cr&egrave;dit (si hi ha, nom&eacute;s n&deg;s y lletres, 9 xifres)</td>
    	<td align="left"><input type="text" id="ResCredit<?php echo $form; ?>" class="inputForm" /></td>
    </tr>
</table>
<?php
}
?>