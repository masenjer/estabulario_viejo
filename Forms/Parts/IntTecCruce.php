<?php	
function CarregaDIVIntTecCruce()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">SOL&middot;LICITUD D' INTERVENCIONS T&Egrave;CNIQUES - Encreuaments</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaIntervTecnicas();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContIntTecCruce" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia">   
                <tr>
                    <td valign="top"><?php CarregaDIVIntTecCruceI(); ?></td>
                    <td valign="top" ><?php CarregaDIVIntTecCruceD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContIntTecCruce").css('max-width', x - 100);
	$("#DIVContIntTecCruce").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVIntTecCruceI()
{
?>
<table width="470px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','IntTecCruce'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraHomronacionyCruces','IntTecCruce'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraRecogida','IntTecCruce'); ?></td>
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
function CarregaDIVIntTecCruceD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
   	<tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','IntTecCruce|270|650'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaIntTecCruce('IntTecCruce');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
