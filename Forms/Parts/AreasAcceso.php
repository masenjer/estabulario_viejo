<?php 
function MostraAreasAcceso($form)
{
?>
<input type="hidden" id="CadenaArea" />
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="5" align="left">&Agrave;rees a les quals ha d'accedir<font class="ast">*</font></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
<?php

$z=0;
$var= array("A1","B1","H1","F1","F5","A2","B2","H2","F2","F6","A3","B3","H3","F3","F7","A4","B4","H4","F4","F8");

for ($i=0;$i<4;$i++)
{
	echo '<tr>';
	for ($j=0;$j<5;$j++)
	{
		echo '<td><input type="checkbox" id="AreaAcceso'.$z.$form.'" onclick="CadenaAreas(\''.$z.'\',\''.$form.'\')">'.$var[$z].'</td>';
		$z++;
	}
	echo '</tr>';
}
?>
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td colspan="5"><input type="checkbox" id="NoSeArea<?php echo $form; ?>" onclick="NoSeArea('<?php echo $form; ?>')">Encara no ho s&eacute;</td>
    </tr>	
    <tr>
    	<td colspan="5"><input type="checkbox" id="OtrasZonas<?php echo $form; ?>" onclick="MostraamagaDIVOtrasZonas('<?php echo $form; ?>');">Altres Zones (Indicar quines)</td>
    </tr>
    <tr>
    	<td colspan="5">
        	<div id="DIVTAOtrasZonas<?php echo $form; ?>" style="display:none;">
            	<textarea id="TAOtrasZonas<?php echo $form; ?>" style="width:100%"  class="inputForm"></textarea>
            </div>
        </td>
    </tr>	
</table>
<?php
}
?>