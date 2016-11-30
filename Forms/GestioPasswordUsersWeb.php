<?php
function MostraGestioPasswordUsersWeb()
{
?>
<div id="DIVGestioPasswordUsersWeb" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;" >
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
                    	<?php CarregaDIVPasswordUsersWeb(); ?>
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

function CarregaDIVPasswordUsersWeb()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">Canvi de contrassenya</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioPasswordUsersWeb();">
        </td>  
    </tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr valign="top">
                    <td align="center"><?php MontaCuadreVerd('MostraFitxaPasswordAnticUsersWeb',''); ?></td>
                </tr>           
                <tr valign="top">
                    <td align="center"><?php MontaCuadreVerd('MostraFitxaPasswordNouUsersWeb',''); ?></td>
                </tr>  
                <tr>
                	<td align="right"><button class="fuenteGestionNoticia" onclick="CanviaPasswordUserWeb();">Canviar Contrassenya</button></td>                
                </tr>         
            </table>
		</td>
	</tr>
</table>
<?php  
}

function MostraFitxaPasswordAnticUsersWeb()
{
?>
<table cellspacing="0" cellpadding="2" border="0">
    <tr>
    	<td width="230px" align="left">Introdueix la contrassenya actual:</td>
        <td><input type="password" id="PassVellUsuarisWeb" name="PassVellUsuarisWeb" class="fuenteGestionNoticia" /></td>
    </tr>
</table>
<?php	
}

function MostraFitxaPasswordNouUsersWeb()
{
?>
<table cellspacing="0" cellpadding="2" border="0">
    <tr>
    	<td width="230px" align="left">Introdueix la contrassenya nova:</td>
        <td><input type="password" id="PassNou1UsuarisWeb" name="PassVellUsuarisWeb" class="fuenteGestionNoticia" /></td>
    </tr>
    <tr>
    	<td width="230px" align="left">Repeteix la contrassenya nova:</td>
        <td><input type="password" id="PassNou2UsuarisWeb" name="PassVellUsuarisWeb" class="fuenteGestionNoticia" /></td>
    </tr>
</table>
<?php	
}
?>
