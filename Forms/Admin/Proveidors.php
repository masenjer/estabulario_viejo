<?php
function MostraGestioProveidors()
{
?>	
<div id="DIVGestioProveidors" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php MostraTOTGestioProveidors(); ?>
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

function MostraTOTGestioProveidors()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; DE PROVE&Iuml;DORS
        </td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioProveidors();">
        </td>  
	</tr>
    <tr>
    	<td colspan="2" bgcolor="#FFFFFF" align="center">
        	<div id="ScrollProveidors" style=" overflow:auto;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr valign="top">
                    	<td style="padding-left:10px;" width="50%"><div id="ProveidorsHabFitxa" align="center"></div></td>
                    	<td width="50%"><div id="ProveidorsTransFitxa" align="center"></div></td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="center" style="padding:20px;"><?php  MontaCuadreVerd('MostraNewProveidors',''); ?></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	y = $(window).height();	
	$("#ScrollProveidors").css('max-height', y - 100);
</script>
	
<?php
}

function MostraNewProveidors()
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
