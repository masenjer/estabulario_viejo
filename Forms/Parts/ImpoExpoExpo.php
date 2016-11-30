<?php	
function CarregaDIVExpo()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">SOLICITUD D' EXPORTACI&Oacute; D' ANIMALS</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaImpoExpo();">
        </td>  
	</tr>
	<tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContExpo" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td valign="top"><?php CarregaDIVExpoI(); ?></td>
                    <td valign="top" ><?php CarregaDIVExpoD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script> 
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContExpo").css('max-width', x - 100);
	$("#DIVContExpo").css('max-height', y - 100);
</script>
<?php  
}

function CarregaDIVExpoI()
{
?>
<table width="550px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','Expo'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraImpoAnimales','Expo'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraOrigenDestino','Expo|del dest&iacute;'); ?></td>
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
function CarregaDIVExpoD()
{
?>
<table width="250px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','Expo|220|460'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaImpoExpo('Expo');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
