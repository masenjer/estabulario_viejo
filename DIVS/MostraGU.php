<?php
function MostraGU()
{
?>
<div id="DIVGU" style="display:none;">
<input type="hidden" id="IdUserGU" />
<table width="100%" height="600px" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center" valign="middle">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="img/MarcSupEsq.png"></td>
                    <td height="11px" background="img/MarcSupC.png"></td>
                    <td width="11px" background="img/MarcSupDret.png"></td>
                </tr>
                <tr valign="middle">
                    <td width="11px" background="img/MarcCEsq.png"></td>
                    <td valign="middle" align="center" background="img/BlancoTrans2.png">
                    	<?php MostraFitxaGU(); ?>
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
?>

<?php
function MostraFitxaGU()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td  height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">GESTI&Oacute; DE T&Egrave;CNICS
</td>  
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioUserGU();">
        </td>   
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" colspan="2">
        	<div id="DIVContUsersGU"  style="overflow:auto;">
                <table width="700px" cellpadding="0" cellspacing="8" border="0" class="fuenteContingut">
                    <tr>
                        <td align="right" style="padding-top:10px;"><?php MostraMenuGridUsers(); ?></td>
                    </tr>
                    <tr>
                        <td height="0px" width="100%" align="right"><?php MostraDivEliminaUser(); ?></td>
                    </tr>
                    <tr>
                    	<td align="center">
                            <table width="800px" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #999; background-color:#FFF;">
                                <tr class="CapcaGrid">
                                    <td width="140px" style="padding-left:10px" align="left">Nom Usuari</td>
                                    <td width="120px" align="center">Gesti&oacute; T&egrave;cnics</td>
                                    <td width="60px" align="center">Stock</td>
                                    <td width="120px" align="center">Gesti&oacute; Esp&egrave;cies</td>
                                    <td width="80px" align="center">Comandes</td>
                                    <td width="140px" align="center">Informe T&egrave;cnic</td>
                                    <td width="140px" align="center">Informe Facturaci&oacute;</td>
                                </tr>
                                 <tr>
                                    <td colspan="7" align="center"><div id="DIVGridGU"></div></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td align="left" style="padding:10px;"><b>Dades personals</b></td>
                    </tr> 
                    <tr valign="top">
                        <td align="center"><?php MontaCuadreVerd('MostraGUIiD',''); ?> </td>
                    </tr>
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr>
                        <td align="left" style="padding:10px;"><b>Permisos</b></td>
                    </tr>
                    <tr>
                        <td align="center"><?php MontaCuadreVerd('MostraPermisos',''); ?></td>
                    </tr>
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr>
                        
                        <td align="right"><input type="button" onclick="UpdateUserGU();" value="Guardar" /></td>
                    </tr>    
                    
                </table>
			</div>
		</td>
	</tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContUsersGU").css('max-width', x - 100);
	$("#DIVContUsersGU").css('max-height', y - 100);
</script>

<?php
}

function MostraGUIiD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="0" border="0">    	      
       	<tr valign="top">
            <td width="33%" align="center"><?php MostraGUI(); ?></td>
            <td width="33%" align="center"><?php MostraGUC(); ?></td>
            <td width="33%" align="center"><?php MostraGUD(); ?></td>
        </tr>
    </table>
<?php	
}

function MostraGUI()
{
?>
<table cellpadding="0" cellspacing="2" border="0">
	<tr>
    	<td>Nom</td>
        <td><input type="text" id="Nombre"></td>
    </tr>
	<tr>
    	<td>Cognoms</td>
        <td><input type="text" id="Apellidos"></td>
    </tr>

</table>
<?php
}
?>

<?php
function MostraGUC()
{
?>
<table cellpadding="0" cellspacing="2" border="0">
	<tr>
    	<td>Usuari</td>
        <td><input type="text" id="UsuarioGU"></td>
    </tr>
   	<tr>
    	<td>Email</td>
        <td><input type="text" id="Email"></td>
    </tr>
</table>
<?php
}
?>
<?php
function MostraGUD()
{
?>
<table cellpadding="0" cellspacing="2" border="0">
	<tr>
    	<td>Password</td>
        <td><input type="password" id="PasswordGU"></td>
    </tr>
    <tr>
    	<td>Confirma Password</td>
        <td><input type="password" id="Password2GU"></td>
    </tr>
</table>
<?php
}
?>
<?php
function MostraMenuGridUsers()
{
?>
	<table cellpadding="0" cellspacing="0" border="0">
    	<tr>
        	<td><input type="button" class="ButtonAdd24" onclick="InicialitzaUserGU();" /></td>
        	<td style="padding-right:30px;"><input type="button" class="ButtonDelete24"  onclick= "MostraDivEliminaUser()"; /></td> 
        </tr>
    </table>
<?php
}
?>

<?php
function MostraPermisos()
{
?>
<table width="100%" cellspacing="0" cellpadding="5" border="0">
    <tr valign="middle">
    	<td><input type="checkbox" id="CheckUsuario" /> T&egrave;cnics</td>
    	<td><input type="checkbox" id="CheckCreacion" /> Creaci&oacute;</td>
    	<td><input type="checkbox" id="CheckEdicion" /> Edici&oacute;</td>
    	<td><input type="checkbox" id="CheckNoticias" /> Home</td>
    	<td><input type="checkbox" id="CheckWebUsers" /> Usuaris web</td>
    </tr>
    <tr>
    	<td><input type="checkbox" id="CheckEmail" /> Email</td>
    	<td><input type="checkbox" id="CheckProveidors" /> Prove&iuml;dors</td>
    	<td><input type="checkbox" id="CheckFungibles" /> Fungibles</td>
    	<td><input type="checkbox" id="CheckInvestigadors" /> Investigadors</td>
    	<td><input type="checkbox" id="CheckProcediments" /> Procediments</td>
    </tr>
    <tr>
    	<td><input type="checkbox" id="CheckStock" /> Stock</td>
    	<td><input type="checkbox" id="CheckEspeciesiSoques" /> Esp&egrave;cies i Soques</td>
    	<td><input type="checkbox" id="CheckComandes" /> Comandes</td>
        <td><input type="checkbox" id="CheckInformeTecnic" /> Informe t&egrave;cnic</td>
        <td><input type="checkbox" id="CheckInformeFacturacio" /> Informe facturaci&oacute;</td>
    </tr>
</table>
<?php
}

function MostraDivEliminaUser()
{
?>

<div id="DIVEliminaUser">
	<table>
    	<tr>
        	<td>Est&aacute;s seguro? </td>
            <td><input type="button" value="Si" onclick="EliminaUser();" /></td>
            <td><input type="button" value="No" onclick="$('#DIVEliminaUser').hide(500);" /></td>
            
        </tr>
    </table>
                
</div>
<?php
}
?>
