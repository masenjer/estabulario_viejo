<?php
function MostraPersonasAccesoFH($form)
{
?>	
<table cellspacing="0" cellpadding="2" border="0">
   	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="3">
             Persona/es que ha/n d' accedir
        </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td>
        	<table>
            	<tr>
                    <td style="padding-left:5px;" width="125px" class="fuenteFormTitol">Nom</td>
                    <td  width="238px" class="fuenteFormTitol">Cognoms</td>
                    <td class="fuenteFormTitol">NIF</td>
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
    	<td align="right" colspan="3"><input type="button" id="PlusAccesoFHButton" class="ButtonPlus" title="Afegir Persona"/></td>
    </tr>
</table>
<?php
}
?>