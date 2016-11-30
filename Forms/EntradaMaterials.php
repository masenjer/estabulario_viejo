<?php
function MostraEntradaMaterials()
{
?>
<div id="DIVFitxa10" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td bgcolor="#FFFFFF" align="center">
                    	<?php CarregaDIVEntradaMaterialsT(); ?>
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

function CarregaDIVEntradaMaterialsT()
{
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        SOL&middot;LICITUD D'ENTRADA DE MATERIALS<br />
   	    A LA PLANTA BAIXA / ZONA PROTEGIDA</td>
	    <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaEntradaMaterials();">
        </td>  
    </tr>
    <tr>
    	<td colspan="2">
        	<div style="max-height:600px; overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td  align="left" style="padding:10px">Aquest formulari s'haur&agrave; d'enviar amb 48 hores d'antelaci&oacute;</td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td valign="top" align="center"><?php MontaCuadreVerd('MostraEntradaMaterialsDia','EntradaMaterials'); ?></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr valign="top">
                    <td align="center"><?php MontaCuadreVerd('MostraObservacions','EntradaMaterials|330|100'); ?></td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
                </tr>
                
                <tr>
                    <td colspan="3" align="right"> 
                        <input type="button" value="Fer la comanda" onClick="GuardaEntradaMateriales('EntradaMaterials');" class="fuenteGestionNoticia">
                    </td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<?php  
}
?>
