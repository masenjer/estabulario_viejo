<?php	
function CarregaDIVAutoritzacioEntradaSE()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">AUTORIZACI&Oacute; D' ENTRADA D' USUARIS AL SE</td>    
	    <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaAccesSE();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContAutoEntrada" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="10" border="0">
                    <tr>
                        <td valign="top"><?php CarregaDIVAutoritzacioEntradaSEI(); ?></td>
                        <td valign="top" ><?php CarregaDIVAutoritzacioEntradaSED(); ?></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContAutoEntrada").css('max-width', x - 100);
	$("#DIVContAutoEntrada").css('max-height', y - 100);
</script>
<?php  
}

function CarregaDIVAutoritzacioEntradaSEI()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraDadesSolicitantEntrada','AutoEntrada'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraAreasAcceso','AutoEntrada'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
    </tr>
</table>
<?php  
}
function CarregaDIVAutoritzacioEntradaSED()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraMotivoAcceso','AutoEntrada'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraContactoAnimales','AutoEntrada'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraCompromisoActualizacionDatos','AutoEntrada'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
        <td align="center"><?php MontaCuadreVerd('MostraObservacions','AutoEntrada|470|25'); ?></td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaAccesEstabulari('AutoEntrada');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
