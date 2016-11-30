<?php	
function CarregaDIVImpo()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">SOL&middot;LICITUD D' IMPORTACI&Oacute; D' ANIMALS</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaImpoExpo();">
        </td>  
	</tr>
    <tr>
    	<td colspan="2" bgcolor="#FFFFFF" align="center">
        	<div id="DIVContImpo" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td valign="top"><?php CarregaDIVImpoI(); ?></td>
                    <td valign="top" ><?php CarregaDIVImpoD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContImpo").css('max-width', x - 100);
	$("#DIVContImpo").css('max-height', y - 100);
</script>
<?php  
}

function CarregaDIVImpoI()
{
?>
<table width="520px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','Impo'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraImpoAnimales','Impo'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>

    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraOrigenDestino','Impo|de l\'origen'); ?></td>
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
function CarregaDIVImpoD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','Impo|270|405'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaImpoExpo('Impo');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
