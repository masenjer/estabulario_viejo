<?php
function MostraAccesSE()
{
?>
<div id="DIVFitxa9" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<div style="overflow:auto;">
                            <div id="DIVFitxa91" style="text-align:center; vertical-align:middle;"><?php CarregaOpcionsAccesSE(); ?></div>
                            <div id="DIVFitxa92" style="display:none"><?php CarregaDIVAccesoPuntual(); ?></div>
                            <div id="DIVFitxa93" style="display:none"><?php CarregaDIVAccesoFueraHorario(); ?></div>
                            <div id="DIVFitxa94" style="display:none"><?php CarregaDIVAutoritzacioEntradaSE(); ?></div>
                        </div>
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

function CarregaOpcionsAccesSE()
{
?>

	<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="0">
    	<tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td align="center"><b>Sel&middot;leccioni una opci&oacute;</b></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td height="41px" onClick="MostraAccesoPuntual();" align="center">					
				<?php CreaDestacatButton("#19616f|#ffffff|Petici&oacute; d' acc&eacute;s puntual al Servei Estabulari"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraAccesoFueraHorario();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Petici&oacute; d' acc&eacute;s fora de l' horari al Servei Estabulari"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraAccesoAutorizacion();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Autoritzaci&oacute; d' entrada d' usuaris al Servei Estabulari"); ?>
			</td>
        </tr>
        <tr>
        	<td height="50px"></td>
        </tr>
        <tr>
        	<td align="center"><input type="button" value="Cancel&middot;lar" onclick="TancaAccesSE();"  /></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
        
    </table>
<?php	
}
?>
