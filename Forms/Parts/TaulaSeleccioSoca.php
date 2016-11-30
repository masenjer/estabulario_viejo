<?php
function MostraTaulaSeleccioSoca()
{
?>
<div id="DIVFitxaSeleccioSoca" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;"">

<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center">
			<?php MaquetacioTaulaSoca();?>
        </td>
    </tr>
    <tr valign="top">
        <td align="center">
        	<img src="img/loader.gif" class="loadingImage" style="width:100px;">
        </td>
    </tr>
</table>
</div>
<?php
}
function MaquetacioTaulaSoca()
{
?>
<table width="722px" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td class="TancaTaulaDN" align="right" ><div onclick="TancaTablaSeleccioSoca();">Tanca la Taula &nbsp; <img src="img/TancaGrid.png" /></div></td>
    </tr>
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
                    <td width="700px" bgcolor="#FFFFFF">
                    	<table width="100%" cellpadding="0" cellspacing="0" border="0" >
                            <tr class="CapGrid">
                                <td height="27px" class="CapcaGrid">Data de Naixement / Arribada</td>			
                                <td height="27px" class="CapcaGrid">N&uacute;mero Procediment</td>			
                                <td height="27px" class="CapcaGrid">Unitats de mascles</td>			
                                <td height="27px" class="CapcaGrid">Unitats de femelles</td>			
                            </tr>
                        </table>
                    	<div id="DIVTaulaSeleccioSoca" style="max-height:500px;overflow:auto"></div>
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
<?php	
}
?>