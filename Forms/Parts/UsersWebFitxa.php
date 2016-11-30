
<?php	

function MostraUsersWebFitxa()
{
?>
<table width="100%" cellspacing="2" cellpadding="0" border="0">
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td colspan="2"><b>Dades d'usuari</b></td>
        <td colspan="3" align="right">
        	<div id="ButtonEstatGestioUsersWeb"></div>
        </td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" >Niu:</td>
        <td  ><input type="text" id="NiuUsersWeb"  class="fuenteGestionNoticia"/></td>
    	<td></td>
        <td align="left">Usuari:</td>
        <td><input type="text" id="UsuariUsersWeb"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" >Password:</td>
        <td  ><input type="password" id="Pass1UsersWeb" class="fuenteGestionNoticia" /></td>
    	<td></td>
    	<td align="left">Repeteix Password:</td>
        <td><input type="password" id="Pass2UsersWeb" class="fuenteGestionNoticia" /></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" >Nom:</td>
        <td  ><input type="text" id="NomUsersWeb" class="fuenteGestionNoticia" /></td>
    	<td></td>
    	<td align="left">Cognoms:</td>
        <td><input type="text" id="CognomsUsersWeb"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" >Tel&egrave;fon / Extensi&oacute;:</td>
        <td  ><input type="text" id="TelefonUsersWeb" class="fuenteGestionNoticia" /></td>
    	<td></td>
    	<td align="left">Adre&ccedil;a Electr&ograve;nica:</td>
        <td> <input type="text" id="EmailUsersWeb" class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left">Investigador Responsable:</td>  
        <td><input type="text" id="InvesRespUsersWeb"  class="fuenteGestionNoticia"/></td>
    	<td></td>
    	<td align="left">Email Responsable:</td>
        <td> <input type="text" id="EmailRespUsersWeb" class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" colspan="5">Departament / Facultat / Centre:  <input type="text" id="DepUsersWeb" style="width:257px;"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="6" align="right"><input type="button" value="Modificar dades d'usuari"  class="fuenteGestionNoticia" onclick="UpdateUsersWeb();"/></td> 
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
</table>
<?php    
}
?>
