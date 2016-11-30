<?php 
function MostraNumProcediment($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
<?php
	if ($form != "CompraFarmacs")
	{
?>
	<tr>
    	<td class="fuenteFormTitol" align="left"> Tria el n&uacute;mero de procediment atorgat per la CEEAH de la UAB  <font class="ast">*</font>
        </td>
        <td>
        	<select id="NProc<?php echo $form; ?>" class="inputForm" style="width:80px"></select>
        </td>
    </tr>
<?php
	}
?>
	<tr>
    	<td align="left" class="fuenteFormTitol" >Centre Gestor o Projecte<font class="ast">*</font></td>
    	<td align="left"><select id="CentreCost<?php echo $form; ?>" class="inputForm"></select></td>
    </tr>
</table>
<?php
}
?>