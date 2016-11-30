<?php	
function CarregaDIVAccesoFueraHorario()
{
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; D' ACC&Eacute;S AL SERVEI <br />D' ESTABULARI FORA D' HORARI</td>    
	    <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaAccesSE();">
        </td>  
</tr>    
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContForaHorari" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td valign="top"><?php CarregaDIVAccesoFueraHorarioD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContForaHorari").css('max-width', x - 100);
	$("#DIVContForaHorari").css('max-height', y - 100);
</script>
<?php  
}

function CarregaDIVAccesoFueraHorarioD()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraFranjaHoraria','ForaHorari'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraPersonasAccesoFH','ForaHorari'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
        <td align="center"><?php MontaCuadreVerd('MostraObservacions','ForaHorari|470|100'); ?></td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaForaHorari('ForaHorari');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
