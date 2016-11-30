<?php
function MostraGestioMailing()
{
?>	
<div id="DIVGestioMailing" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td width="500px" bgcolor="#FFFFFF">
                    	<?php MostraTOTGestioMailing(); ?>
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

function MostraTOTGestioMailing()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; DE MAILING
        </td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioMailing();">
        </td>  
	</tr>
    <tr>
    	<td colspan="2" bgcolor="#FFFFFF" align="center" style="padding:10px;">
        	<div id="ScrollMailing" style=" overflow:auto;">
                <table width="100%" cellpadding="10" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    
                    <tr>
                    	<td align="left"><b>Assumpte: </b></td>
                    </tr>
                    <tr>
                    	<td>
                        	<input type="text" id="AssumpteGestioMail" class="fuenteGestionNoticia" style="width:100%" /> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>Cos de l'email</b>
                        </td>                    	
                    </tr>
                    <tr>
                    	<td>
                        	<textarea id="CosGestioEmail" class="fuenteGestionNoticia"></textarea>
                        </td>
                    </tr>
                    <tr>
                    	<td align="right">
                        	<input type="button" class="fuenteGestionNoticia" value="Enviar Email" onclick="EnviarGestioEmail();" />
                        </td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<?php	
}
?>
