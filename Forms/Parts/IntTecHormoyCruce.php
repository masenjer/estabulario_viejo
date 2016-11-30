<?php	
function CarregaDIVIntTecHormoyCruce()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">SOL&middot;LICITUD D' INTERVENCIONS T&Egrave;CNIQUES - Hormonaci&oacute; i encreuaments</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaIntervTecnicas();">
        </td>  
	</tr>
	<tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContIntTecHormoyCruce" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia">     
                <tr>
                    <td valign="top"><?php CarregaDIVIntTecHormoyCruceI(); ?></td>
                    <td valign="top"><?php CarregaDIVIntTecHormoyCruceD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	//$("#DIVContIntTecHormoyCruce").css('max-width', x - 100);
	$("#DIVContIntTecHormoyCruce").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVIntTecHormoyCruceI()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','IntTecHormoyCruce'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraHomronacionyCruces','IntTecHormoyCruce'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraRecogida','IntTecHormoyCruce'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding-left:10px"><font class="ast">*</font>Campos Obligatorios</td>
    </tr>
</table>
<?php  
}


function CarregaDIVIntTecHormoyCruceD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','IntTecHormoyCruce|270|690'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>

    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaIntTec('IntTecHormoyCruce');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
