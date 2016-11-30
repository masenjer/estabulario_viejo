<?php
function MostraGestioUsersWeb()
{
?>	
<div id="DIVGestioUsersWeb" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td width="900px" bgcolor="#FFFFFF">
                    	<?php MostraTOTGestioUsersWeb(); ?>
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

function MostraTOTGestioUsersWeb()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; D' USUARIS WEB
        </td> 
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioUsersWeb();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVAlcadaUsersWeb" style="overflow:auto;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    
                    <tr>
                        <td align="center"><div id="DIVCabTaulaGestioUsersWeb"></div></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center"><div id="DIVCosTaulaGestioUsersWeb"></div></td>
                    </tr>
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center"><?php  MontaCuadreVerd('MostraUsersWebFitxa',''); ?></td>
                    </tr>
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <div id="DIVTaulaProcedimentInves" style="width:400px;height:120px;overflow:auto; border:solid; border-color:#b2b4b4; border-width:1px;"></div></td>
                    </tr>
                    <tr>
                        <td height="10px"></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	//$("#DIVAlcadaAmpladaGestioComandes").css('width', x - 100);
	$("#DIVAlcadaUsersWeb").css('max-width', x);
	$("#DIVAlcadaUsersWeb").css('height', y - 100);
</script>
	
<?php
}
?>
