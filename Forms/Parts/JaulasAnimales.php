<?php
function MostraIntTecAnimales($form)
{
?>	
<table cellspacing="0" cellpadding="2" border="0">
   	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="2">
			 Animals
        </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
        <tr>
        	<td><table id="tableAnimales<?php echo $form;?>" cellspacing="0" cellpadding="2" border="0"></table></td>
        </tr>
    </table>
<?php
}

function MostraIntTecJaulas($form)
{
?>	
<table cellspacing="0" cellpadding="2" border="0">
   	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="2">
			 G&agrave;bies
        </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
        <tr>
        	<td><table id="tableJaulas<?php echo $form;?>" cellspacing="0" cellpadding="2" border="0"></table></td>
        </tr>
    </table>
<?php
}
?>