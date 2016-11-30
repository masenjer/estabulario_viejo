<?php
function MostraGestioInformes()
{
?>	
<div id="DIVGestioInformes" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php MostraTOTGestioInformes(); ?>
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

function MostraTOTGestioInformes()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute;N DE USUARIOS WEB
        </td> 
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioInformes();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="ScrollInformes" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    
                    <tr>
                        <td align="center"><input type="button" id="InformeDiariButton" value="Informe diari" onclick="ImprimeixInformeDiari();" /></td>
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
	y = $(window).height();	
	$("#ScrollInformes").css('max-height', y - 100);
</script>
	
<?php
}
?>
