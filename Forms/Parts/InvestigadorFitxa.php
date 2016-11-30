
<?php	

function MostraInvestigadorFitxa()
{
?>
<table cellspacing="2" cellpadding="0" border="0">
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td colspan="2"><b>Dades de l'investigador</b></td>
        <td colspan="3" align="right">
        	<div id="ButtonEstatGestioInvestigador"></div>
        </td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" >Nom:</td>
        <td  ><input type="text" id="NomInvestigador" class="fuenteGestionNoticia" /></td>
    	<td></td>
    	<td align="left">Cognoms:</td>
        <td><input type="text" id="CognomsInvestigador"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" >Tel&egrave;fon / Extensi&oacute;:</td>
        <td  ><input type="text" id="TelefonInvestigador" class="fuenteGestionNoticia" /></td>
    	<td></td>
    	<td align="left">Adre&ccedil;a Electr&ograve;nica:</td>
        <td> <input type="text" id="EmailInvestigador" class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" colspan="5">Departament / Facultat / Centre:  <input type="text" id="DepInvestigador" style="width:257px;"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="6" align="right"><input type="button" id="UpdateInvestigadorButton" value="Guardar"  class="fuenteGestionNoticia" onclick="UpdateInvestigador();"/></td> 
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
</table>
<?php    
}
?>
