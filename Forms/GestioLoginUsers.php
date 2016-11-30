<?php
function MostraGestioLoginUsers()
{
?>
<div id="DIVGestioLoginUsers" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;" >
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="img/MarcSupEsq.png"></td>
                    <td height="11px" background="img/MarcSupC.png"></td>
                    <td width="11px" background="img/MarcSupDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcCEsq.png"></td>
                    <td bgcolor="#FFFFFF">
                    	<?php CarregaDIVLoginUsers(); ?>
                    </td>
                    <td width="11px" background="img/MarcCDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcInfEsq.png"></td>
                    <td height="10px" background="img/MarcInfC.png"></td>
                    <td width="11px" background="img/MarcInfDret.png"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php
}

function CarregaDIVLoginUsers()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">Acc&eacute;s i alta d'usuaris</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaLoginUsers();">
        </td>  
    </tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr valign="top">
                    <td align="center"><?php MontaCuadreVerd('MostraFitxaLoginUser',''); ?></td>
                </tr>           
                <tr valign="top">
                    <td align="center"><?php MontaCuadreVerd('MostraPasswordOblidat',''); ?></td>
                </tr>           
                <tr>
                    <td align="center"><?php MontaCuadreVerd('MostraNewUser',''); ?></td>
                </tr>
            </table>
		</td>
	</tr>
</table>
<?php  
}

function MostraFitxaLoginUser()
{
?>
<table cellspacing="0" cellpadding="2" border="0">
    <tr>
    	<td colspan="5" align="left"><b> Acc&eacute;s usuaris registrats</b></td>
    </tr>
    <tr>
    	<td align="left" width="60px">Usuari:</td>
        <td width="180px"><input type="text" id="URUsuari" name="URUsuari" class="fuenteGestionNoticia"   onKeyPress="submitenter(11,event,'')"/></td>
    	<td align="left" width="70px">Contrasenya:</td>
        <td><input type="password" id="URPassword"  class="fuenteGestionNoticia"  onKeyPress="submitenter(11,event,'')"/></td>
    	<td><input type="button" id="URLoginButton" value="Accedir"  class="fuenteGestionNoticia" onclick="ComprovaLoginUsersPublic(); "/></td>
    </tr>
</table>

<?php	
}

function MostraPasswordOblidat()
{
?>
<table cellspacing="0" cellpadding="2" border="0">
    <tr>
    	<td colspan="3" align="left"><b> Has oblidat el teu usuari i/o la teva contrasenya?</b></td>
    </tr>
    <tr>
    	<td align="left">Introdueix aqu&iacute; l'email amb el que et vas donar d'alta:</td>
        <td><input type="text" id="OblidatEmail" class="fuenteGestionNoticia"   onKeyPress="submitenter(12,event,'')"/></td>
    	<td><input type="button" value="Enviar dades al meu Email"  class="fuenteGestionNoticia" onclick="RecordaDadesUsuari(); "/></td>
    </tr>
</table>

<?php	
}

function MostraNewUser()
{
?>
<?php include("VAR/PK.php")?>

<table width="100%" cellspacing="0" cellpadding="2" border="0">
    <tr>
    	<td colspan="4" align="left"><b> Donar-me d'alta com a nou usuari </b></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td align="left" width="60px">Niu:</td>
        <td width="210px"><input type="text" id="UNNiu"  class="fuenteGestionNoticia"/></td>
    	<td align="left" width="70px">Usuari:</td>
        <td><input type="text" id="UNUsuari"  class="fuenteGestionNoticia"/></td>
    </tr>
    <tr>
    	<td align="left" width="60px">Password:</td>
        <td width="210px"><input type="password" id="UNPass1" class="fuenteGestionNoticia" /></td>
    	<td align="left" width="70px">Repeteix Password:</td>
        <td><input type="password" id="UNPass2" class="fuenteGestionNoticia" /></td>
    </tr>
    <tr>
    	<td align="left" width="60px">Nom:</td>
        <td width="210px"><input type="text" id="UNNom" class="fuenteGestionNoticia" /></td>
    	<td align="left" width="70px">Cognoms:</td>
        <td><input type="text" id="UNCognoms"  class="fuenteGestionNoticia"/></td>
    </tr>
    <tr>
    	<td height="1px"></td>
    </tr>
    <tr>
    	<td align="left" width="60px">Telefon / Extensi&oacute;:</td>
        <td width="210px"><input type="text" id="UNTelefon" class="fuenteGestionNoticia" /></td>
    	<td align="left" width="70px">Adre&ccedil;a Electr&ograve;nica:</td>
        <td> <input type="text" id="UNEmail" class="fuenteGestionNoticia"/></td>
    </tr>
    <tr>
    	<td height="1px"></td>
    </tr>
    <tr>
    	<td align="left">Investigador Responsable:</td>  
        <td><input type="text" id="UNInvesResp"  class="fuenteGestionNoticia"/></td>
    	<td align="left" width="70px">Email Responsable:</td>
        <td> <input type="text" id="UNEmailResp" class="fuenteGestionNoticia"/></td>
    </tr>
    <tr>
    	<td align="left" colspan="4">Departament / Facultat / Centre:  <input type="text" id="UNDep" style="width:257px;"  class="fuenteGestionNoticia"/></td>
    </tr>
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
        <td colspan="4" align="right"><?php echo recaptcha_get_html($publickey, $error, $use_ssl = true); ?></td>
    </tr>
    <tr>
    	<td colspan="4" align="right"><input type="button" id="ULLoginButton" value="Donar-me d'alta"  class="fuenteGestionNoticia" onclick="ValidaNewUser();"/></td> 
    </tr>
</table>
<?php    
}
?>
