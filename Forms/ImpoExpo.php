<?php
function MostraImpoExpo()
{
?>
<div id="DIVFitxa6" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                        <div id="DIVFitxa61" style="text-align:center; vertical-align:middle;"><?php CarregaOpcionsImpoExpo(); ?></div>
                        <div id="DIVFitxa62" style="display:none"><?php CarregaDIVImpo(); ?></div>
                        <div id="DIVFitxa63" style="display:none"><?php CarregaDIVExpo(); ?></div>
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

function CarregaOpcionsImpoExpo()
{
?>

	<table width="100%" cellpadding="2" cellspacing="0" border="0">
    	<tr>
        	<td height="20px"></td>
        </tr>
        <tr>
        	<td align="center"><b>Seleccioni una opci&oacute;</b></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td height="41px" onClick="MostraImpo();" align="center">					
				<?php CreaDestacatButton("#19616f|#ffffff|Importaci&oacute;"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraExpo();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Exportaci&oacute;"); ?>
			</td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td align="center"><input type="button" value="Cancel&middot;lar" onclick="TancaImpoExpo();"  /></td>
        </tr>     
        <tr>
        	<td height="20px"></td>
        </tr>
    </table>
<?php	
}
?>
