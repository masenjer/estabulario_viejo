<?php	
function CarregaDIVCompraFarmacsT()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; DE COMPRA DE F&Agrave;RMACS, DESINFECTANTS I FUNGIBLES</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaCompra();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContCompraFarmacs" style=" overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td valign="top"><?php CarregaDIVCompraFarmacsI(); ?></td>
                    <td valign="top" ><?php CarregaDIVCompraFarmacsD(); ?></td>
                </tr>
           </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	//$("#DIVContCompraFarmacs").css('max-width', x - 100);
	$("#DIVContCompraFarmacs").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVCompraFarmacsI()
{
?>
<table width="460px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','CompraFarmacs'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDIVConsumible','CompraFarmacs|Farmac'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDIVConsumible','CompraFarmacs|Desinfectante'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDIVConsumible','CompraFarmacs|Fungible'); ?></td>
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
function CarregaDIVCompraFarmacsD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','CompraFarmacs|270|440'); ?></td>
    </tr>   
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaCompraConsumibles('CompraFarmacs');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
