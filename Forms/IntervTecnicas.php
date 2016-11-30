<?php
function MostraIntervTecnicas()
{
?>
<div id="DIVFitxa5" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                            <div id="DIVFitxa51" style="text-align:center; vertical-align:middle; background-color:#FFF;"><?php CarregaOpcionsIntervTecnicas(); ?></div>
                            <div id="DIVFitxa52" style="display:none"><?php CarregaDIVIntTecHormoyCruce(); ?></div>
                            <div id="DIVFitxa53" style="display:none"><?php CarregaDIVIntTecCruce(); ?></div>
                            <div id="DIVFitxa54" style="display:none"><?php CarregaDIVIntTecJaulasAnimales(); ?></div>
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

function CarregaOpcionsIntervTecnicas()
{
?>

	<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="0">
    	<tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td align="center"><b>Sel&middot;leccioni una opci&oacute; d' Intervenci&oacute; t&egrave;cnica</b></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td height="41px" onClick="MostraIntHormonacion();" align="center">					
				<?php CreaDestacatButton("#19616f|#ffffff|Hormonaci&oacute; i encreuaments"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraIntCruces();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Encreuaments"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraIntJaulas();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Sortida de G&agrave;bies / Animals"); ?>
			</td>
        </tr>
        <tr>
        	<td height="50px"></td>
        </tr>
        <tr>
        	<td align="center"><input type="button" value="Cancel&middot;lar" onclick="TancaIntervTecnicas();"  /></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>        
    </table>
<?php	
}
?>
