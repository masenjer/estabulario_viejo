<?php	
function CarregaDIVIntTecJaulasAnimales()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">SOL&middot;LICITUD D' INTERVENCIONS T&Egrave;CNIQUES - Sortida de G&agrave;bies/Animals</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaIntervTecnicas();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContIntTecJaulasAnimales" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia">   
                <tr>
                    <td valign="top"><?php CarregaDIVIntTecJaulasAnimalesI(); ?></td>
                    <td valign="top" ><?php CarregaDIVIntTecJaulasAnimalesD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContIntTecJaulasAnimales").css('max-width', 900);
	$("#DIVContIntTecJaulasAnimales").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVIntTecJaulasAnimalesI()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','IntTecJaulasAnimales'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>

    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraIntTecAnimales','IntTecJaulasAnimales'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>    
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraIntTecJaulas','IntTecJaulasAnimales'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraRecogidaJaulas','IntTecJaulasAnimales'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDevolucionJaulas','IntTecJaulasAnimales'); ?></td>
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
function CarregaDIVIntTecJaulasAnimalesD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','IntTecJaulasAnimales|270|550'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaJaulasAnimales('IntTecJaulasAnimales');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
