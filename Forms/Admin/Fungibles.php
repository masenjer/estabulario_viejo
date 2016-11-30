<?php
function MostraGestioFungibles()
{
?>	
<div id="DIVGestioFungibles" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php MostraTOTGestioFungibles(); ?>
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

function MostraTOTGestioFungibles()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; DE FUNGIBLES
        </td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioFungibles();">
        </td>  
	</tr>
    <tr>
    	<td colspan="2" bgcolor="#FFFFFF" align="center">
        	<div id="ScrollFungibles" style=" overflow:auto;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr valign="top">
                    	<td style="padding-left:10px;" width="50%"><div id="FungiblesHabFitxa" align="center"></div></td>
                    	<td width="50%"><div id="FungiblesTransFitxa" align="center"></div></td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="center" style="padding:20px;"><?php  MontaCuadreVerd('MostraNewFungibles',''); ?></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
	
<?php
}

function MostraNewFungibles()
{
?>
	<table class="fuenteGestionNoticia">
    	<tr>
        	<td>Nom del prove&iuml;dor</td>
            <td colspan="2"><input type="text" id="NomNewProveidor" class="fuenteGestionNoticia"/></td>
        </tr>
        <tr>
            <td>Tipus</td>
            <td>
            	<select id="TipusNewProveidor" class="fuenteGestionNoticia">
                	<option value="-">-----------</option>
                    <option value="0">Habitual</option>
                	<option value="1">Transgenic</option>
                </select>
            </td>
            <td><input type="button" class="ButtonSave32" onclick="SaveNewProveidor();" /></td>
        </tr>
    </table>
<?php	
}
?>
